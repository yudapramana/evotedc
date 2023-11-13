<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\Member;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    public $route_index = 'verification';
    public $view_folder = 'backend.verification';

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
            $list->whereHas('validations', function ($query) use ($keyword) {
                $query->where('name', 'like', '%' . $keyword . '%');
            });
            $params['keyword'] = $keyword;
        } else {
            $list->whereHas('validations')->orderBy('name', 'asc');
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
}
