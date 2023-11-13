<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\Candidate;
use App\Model\Mission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class CandidateController extends Controller
{
    public $route_index = 'candidates';
    public $view_folder = 'backend.candidates';

    /**
     * show list data
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request) {
        $data['current_menu'] = getCurrentMenu($this->route_index);
        $data['route_index'] = $this->route_index;
        $data['list'] = Candidate::orderBy('type','asc')->orderBy('number', 'asc')->get();
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
        $data['detail'] = $detail = Candidate::findOrFail($id);
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
        $data['detail'] = $detail = Candidate::findOrFail($id);
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
                'image' => 'required',
                'name' => 'required',
                'number' => 'required',
                'vision' => 'required',
                'study' => 'required',
                'faculty' => 'required',
                'department' => 'required',
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $data = [
                'image' => request('image'),
                'name' => request('name'),
                'number' => request('number'),
                'vision' => request('vision'),
                'study' => request('study'),
                'faculty' => request('faculty'),
                'department' => request('department'),
            ];
            $saveData = Candidate::create($data);
            if(!$saveData->exists) {
                Alert::error('Error', 'Terjadi kesalahan saat menyimpan data, silahkan coba lagi!');
            }
            $missions =  request('mission');
            foreach ($missions as $item) {
                Mission::create([
                    'candidate_id' => $saveData->id,
                    'mission' => $item
                ]);
            }
            Alert::success('Sukses', 'Data telah tersimpan!');
            return redirect(route($this->route_index));
        } catch (\Exception $e) {
            Alert::error('Error', $e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * update data on database
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id = false) {
        try {
            $validator = Validator::make($request->all(), [
                'image' => 'required',
                'name' => 'required',
                'number' => 'required',
                'vision' => 'required',
                'study' => 'required',
                'faculty' => 'required',
                'department' => 'required',
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $detail = Candidate::findOrFail($id);
            $data = [
                'image' => request('image'),
                'name' => request('name'),
                'number' => request('number'),
                'vision' => request('vision'),
                'study' => request('study'),
                'faculty' => request('faculty'),
                'department' => request('department'),
            ];
            if(!$detail->update($data)) {
                Alert::error('Error', 'Terjadi kesalahan saat menyimpan data, silahkan coba lagi!');
            }
            $detail->missions()->delete();
            $missions =  request('mission');
            foreach ($missions as $item) {
                Mission::create([
                    'candidate_id' => $detail->id,
                    'mission' => $item
                ]);
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
        if(Candidate::destroy(request('id'))) {
            Alert::success('Success', 'Data telah terhapus data!');
        } else {
            Alert::error('Error', 'Maaf terjadi kesalahan saat menghapus data!');
        }
        return redirect()->back();
    }
}
