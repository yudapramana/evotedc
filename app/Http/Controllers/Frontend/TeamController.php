<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * show teams page's
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data['teams'] = Team::get();
        session()->forget(['current_member','finish_vote', 'finish_note']);
        return view('frontend.teams.index', $data);
    }
}
