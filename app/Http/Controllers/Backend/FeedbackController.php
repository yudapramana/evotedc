<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public $route_index = 'feedback';
    public $view_folder = 'backend.feedback';

    /**
     * show list data
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request) {
        $data['current_menu'] = getCurrentMenu($this->route_index);
        $data['route_index'] = $this->route_index;
        $data['list'] = Feedback::get();
        return view($this->view_folder . '.index', $data);
    }
}
