<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Imports\MemberImport;
use App\Model\City;
use App\Model\Member;
use App\Model\State;
use App\Model\Study;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class MemberController extends Controller
{
    public $route_index = 'members';
    public $view_folder = 'backend.members';

    /**
     * show list data
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request) {
        $data['current_menu'] = getCurrentMenu($this->route_index);
        $data['route_index'] = $this->route_index;

        $params = [];
        $keyword = $data['keyword'] = request('keyword') ? request('keyword') : null;
        $per_page = $data['per_page'] = request('per_page') ? request('per_page') : null;
        $list = Member::query();
        if($keyword) {
            $list->where('name', 'like', '%' . $keyword . '%');
            $list->orWhere('email', 'like', '%' . $keyword . '%');
            // $list->orWhere('student_number', 'like', '%' . $keyword . '%');
            $params['keyword'] = $keyword;
        } else {
            $list->orderBy('name', 'asc');
        }
        if($per_page) {
            $params['per_page'] = $per_page;
        } else {
            $per_page = 10;
        }
        $data['list'] = $list->paginate($per_page)
            ->setPath(route($this->route_index, $params));
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
        $data['studies'] = Study::orderBy('name')->get();
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
        $data['detail'] = $detail = Member::findOrFail($id);
        $data['studies'] = Study::orderBy('name')->get();
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
        $data['detail'] = $detail = Member::findOrFail($id);
        $data['studies'] = Study::orderBy('name')->get();
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
                'student_number' => 'required',
                'name' => 'required',
                'email' => 'required|email',
                'study_id' => 'required|exists:studies,id',
                'faculty' => 'required',
                'voter_key' => 'required',
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $data = [
                'student_number' => request('student_number'),
                'name' => request('name'),
                'email' => strtolower(request('email')),
                'study_id' => request('study_id'),
                'faculty' => request('faculty'),
                'voter_key' => request('voter_key'),
            ];
            $saveData = Member::create($data);
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
     * update data on database
     * @param Request $request
     * @param bool $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id = false) {
        try {
            $validator = Validator::make($request->all(), [
                'student_number' => 'required',
                'name' => 'required',
                'email' => 'required|email',
                'study_id' => 'required|exists:studies,id',
                'faculty' => 'required',
                'voter_key' => 'required',
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $detail = Member::findOrFail($id);
            $data = [
                'student_number' => request('student_number'),
                'name' => request('name'),
                'email' => strtolower(request('email')),
                'study_id' => request('study_id'),
                'faculty' => request('faculty'),
                'voter_key' => request('voter_key'),
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
        if(Member::destroy(request('id'))) {
            Alert::success('Success', 'Data telah terhapus data!');
        } else {
            Alert::error('Error', 'Maaf terjadi kesalahan saat menghapus data!');
        }
        return redirect()->back();
    }


    /**
     * import from excel to database
     * @param Request $request
     * @return array|\Illuminate\Http\RedirectResponse
     */
    public function import(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'file' => 'required|max:50000',
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            Excel::import(new MemberImport, request('file'));
            Alert::success('Success', 'Data telah tersimpan!');
            return redirect()->back();
        } catch (\Exception $exception) {
            Alert::error('Error', $exception->getMessage());
            return redirect()->back();
        }
    }

    public function jsonDatatable() {
        $list = Member::orderBy('name', 'asc')->get();
        $list->transform(function ($item) {
            $item->{'state_name'} = $item->state->name;
            $result = [
                'id' => $item->id,
                'student_number' => $item->student_number,
                'name' => $item->name,
                'email' => $item->email,
                'action' => [
                    'read' => Auth::user()->can('read-' . $this->route_index),
                    'read_url' => route($this->route_index . '.view', $item->id),
                    'edit' => Auth::user()->can('edit-' . $this->route_index),
                    'edit_url' => route($this->route_index . '.edit', $item->id)
                ],
            ];
            return $result;
        });
        return DataTables::of($list)->make();
    }
}
