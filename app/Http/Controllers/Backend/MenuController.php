<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\Language;
use App\Model\Menu;
use App\Model\MenuPermission;
use App\Rules\MultiLangContentValidation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class MenuController extends Controller
{
    public $route_index = 'menus';
    public $view_folder = 'backend.menus';

    /**
     * show list data
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request) {
        $data['current_menu'] = getCurrentMenu($this->route_index);
        $data['route_index'] = $this->route_index;
        $data['list'] = Menu::orderBy('name', 'asc')->get();
        return view($this->view_folder . '.index', $data);
    }

    /**
     * show create page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create() {
        $data['current_menu'] = getCurrentMenu($this->route_index);
        $data['route_index'] = $this->route_index;
        $data['menus'] = Menu::where('parent_id', 0)->orderBy('name', 'asc')->get();
        $data['languages'] = Language::get();
        return view($this->view_folder . '.create', $data);
    }

    /**
     * show edit page
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Request $request, $id) {
        $data['current_menu'] = getCurrentMenu($this->route_index);
        $data['route_index'] = $this->route_index;
        $data['menus'] = Menu::where('parent_id', 0)->orderBy('name', 'asc')->get();
        $data['detail'] = Menu::findOrFail($id);
        $data['languages'] = Language::get();
        return view($this->view_folder . '.edit', $data);
    }

    /**
     * show detail page
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function view(Request $request, $id) {
        $data['current_menu'] = getCurrentMenu($this->route_index);
        $data['route_index'] = $this->route_index;
        $data['menus'] = Menu::where('parent_id', 0)->orderBy('name', 'asc')->get();
        $data['detail'] = Menu::findOrFail($id);
        $data['languages'] = Language::get();
        return view($this->view_folder . '.view', $data);
    }

    public function store(Request $request) {
        try {
            $validator = Validator::make($request->all(), [
                'name' => new MultiLangContentValidation,
                'menu_type' => 'required',
                'slug' => 'required',
                'route_name' => 'required',
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $data = [
                'parent_id' => request('parent_id') ? request('parent_id') : 0,
                'name' => request('name'),
                'menu_type' => request('menu_type'),
                'slug' => request('slug'),
                'route_name' => request('route_name'),
                'prefix_permission' => request('route_name'),
                'icon_type' => 'icon',
                'icon' => request('icon'),
                'status' => request('status') ? true : false
            ];
            $saveData = Menu::create($data);
            if(!$saveData->exists) {
                Alert::error('Error', 'Terjadi kesalahan saat menyimpan data, silahkan coba lagi!');
            }
            if($request->has('permission_name') && request('menu_type') == 'menu')
            {
                $permission_name = request('permission_name');
                foreach ($permission_name as $key => $name) {
                    Permission::create([
                        'menu_id' => $saveData->id,
                        'permission_label' => $permission_name[$key],
                        'name' => $permission_name[$key] . '-' . $saveData->prefix_permission,
                    ]);
                }
            }
            Alert::success('Sukses', 'Data telah tersimpan!');
            return redirect(route($this->route_index));
        } catch (\Exception $exception) {
            Alert::error('Error', $exception->getMessage());
            return redirect()->back();
        }
    }

    /**
     * update data on database
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id) {
        try {
            $validator = Validator::make($request->all(), [
                'name' => new MultiLangContentValidation,
                'menu_type' => 'required',
                'slug' => 'required',
                'route_name' => 'required',
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $detail = Menu::findOrFail($id);
            $data = [
                'parent_id' => request('parent_id') ? request('parent_id') : 0,
                'name' => request('name'),
                'menu_type' => request('menu_type'),
                'slug' => request('slug'),
                'route_name' => request('route_name'),
                'prefix_permission' => request('route_name'),
                'icon_type' => 'icon',
                'icon' => request('icon'),
                'status' => request('status') ? true : false
            ];
            if(!$detail->update($data)) {
                Alert::error('Error', 'Terjadi kesalahan saat menyimpan data, silahkan coba lagi!');
            }
            foreach ($detail->permissions as $permission) {
                Permission::where('name', $permission->permission)->delete();
            }
            if($request->has('permission_name') && request('menu_type') == 'menu')
            {
                $permission_name = request('permission_name');
                foreach ($permission_name as $key => $name) {
                    Permission::updateOrCreate([
                        'menu_id' => $detail->id,
                        'permission_label' => $permission_name[$key],
                        'name' => $permission_name[$key] . '-' . $detail->prefix_permission,
                    ]);
                }
            }
            Alert::success('Sukses', 'Data telah tersimpan!');
            return redirect(route($this->route_index));
        } catch (\Exception $exception) {
            Alert::error('Error', $exception->getMessage());
            return redirect()->back();
        }
    }

    /**
     * delete data from database
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(Request $request) {
        /** remove spatie permission */
        $menus = Menu::whereIn('id', request('id'))->get();
        foreach ($menus as $item) {
            foreach ($item->permissions as $permission) {
                Permission::where('name', $permission->permission)->delete();
            }
        }
        if(Menu::destroy(request('id'))) {
            Alert::success('Success', 'Data telah terhapus data!');
        } else {
            Alert::error('Error', 'Maaf terjadi kesalahan saat menghapus data!');
        }
        return redirect()->back();
    }
}
