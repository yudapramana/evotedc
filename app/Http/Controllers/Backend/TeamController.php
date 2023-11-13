<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\City;
use App\Model\State;
use App\Model\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class TeamController extends Controller
{
    public $route_index = 'teams';
    public $view_folder = 'backend.teams';

    /**
     * show list data
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request) {
        $data['current_menu'] = getCurrentMenu($this->route_index);
        $data['route_index'] = $this->route_index;
        $data['list'] = Team::get();
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
        $data['states'] = State::orderBy('name', 'asc')->get();
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
        $data['detail'] = $detail = Team::findOrFail($id);
        return view($this->view_folder . '.edit', $data);
    }

    /**
     * show edit page
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function view(Request $request, $id) {
        $data['current_menu'] = getCurrentMenu($this->route_index);
        $data['route_index'] = $this->route_index;
        $data['detail'] = $detail = Team::findOrFail($id);
        return view($this->view_folder . '.view', $data);
    }

    /**
     * store data to database
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request) {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'position' => 'required',
                'department' => 'required',
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $data = [
                'name' => request('name'),
                'position' => request('position'),
                'department' => request('department'),
            ];
            $saveData = Team::create($data);
            if(!$saveData->exists) {
                Alert::error('Error', 'Terjadi kesalahan saat menyimpan data, silahkan coba lagi!');
            }
            Alert::success('Sukses', 'Data telah tersimpan!');
            return redirect(route($this->route_index));
        } catch (\Exception $e) {
            Alert::error('Error', $e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * save data to database
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id) {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'position' => 'required',
                'department' => 'required',
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $detail = Team::findOrFail($id);
            $data = [
                'name' => request('name'),
                'position' => request('position'),
                'department' => request('department'),
            ];
            if(!$detail->update($data)) {
                Alert::error('Error', 'Terjadi kesalahan saat menyimpan data, silahkan coba lagi!');
            }
            Alert::success('Sukses', 'Data telah tersimpan!');
            return redirect(route($this->route_index));
        } catch (\Exception $e) {
            Alert::error('Error', $e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * remove data from database
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(Request $request) {
        if(Team::destroy(request('id'))) {
            Alert::success('Success', 'Data telah terhapus data!');
        } else {
            Alert::error('Error', 'Maaf terjadi kesalahan saat menghapus data!');
        }
        return redirect()->back();
    }
}
