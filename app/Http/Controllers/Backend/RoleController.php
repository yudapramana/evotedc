<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public $route_index = 'roles';
    public $view_folder = 'backend.roles';

    /**
     * show list data
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request) {
        $data['current_menu'] = getCurrentMenu($this->route_index);
        $data['route_index'] = $this->route_index;
        $data['list'] = Role::orderBy('name', 'asc')->get();
        return view($this->view_folder . '.index', $data);
    }

    /**
     * show create page
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Request $request) {
        $data['current_menu'] = getCurrentMenu($this->route_index);
        $data['route_index'] = $this->route_index;
        $data['menus'] = Menu::where('parent_id', 0)->get();
        return view($this->view_folder . '.create', $data);
    }

    /**
     * show view page
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function view(Request $request, $id) {
        $data['current_menu'] = getCurrentMenu($this->route_index);
        $data['route_index'] = $this->route_index;
        $data['detail'] = Role::findOrFail($id);
        $data['menus'] = Menu::where('parent_id', 0)->get();
        return view($this->view_folder . '.view', $data);
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
        $data['detail'] = Role::findOrFail($id);
        $data['menus'] = Menu::where('parent_id', 0)->get();
        return view($this->view_folder . '.edit', $data);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request) {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $data = [
                'name' => request('name'),
                'guard_name' => 'web',
                'delete_able' => true,
            ];
            $saveData = Role::create($data);
            if(!$saveData->exists) {
                Alert::error('Error', 'Terjadi kesalahan saat menyimpan data, silahkan coba lagi!');
            }
            if($request->has('permission'))
            {
                $saveData->syncPermissions(request('permission'));
            }
            Alert::success('Sukses', 'Data telah tersimpan!');
            return redirect(route($this->route_index));
        } catch (\Exception $exception) {
            Alert::error('Error', $exception->getMessage());
            return redirect()->back();
        }
    }

    /**
     * update data from database
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id) {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
            ]);
            if($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $detail = Role::findOrFail($id);
            $data = [
                'name' => request('name')
            ];
            $detail->update($data);
            if($request->has('permission'))
            {
                $detail->syncPermissions(request('permission'));
            }
            Alert::success('Sukses', 'Data telah tersimpan!');
            return redirect(route($this->route_index));
        } catch (\Exception $exception) {
            Alert::error('Error', $exception->getMessage());
            return redirect()->back();
        }
    }

    public function delete(Request $request) {
        if(Role::destroy(request('id'))) {
            Alert::success('Success', 'Data telah terhapus data!');
        } else {
            Alert::error('Error', 'Maaf terjadi kesalahan saat menghapus data!');
        }
        return redirect()->back();
    }
}
