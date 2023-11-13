<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\Candidate;
use App\Model\Feedback;
use App\Model\Language;
use App\Model\Mission;
use App\Model\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    /**
     * Show the application home.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        session()->forget(['current_member','finish_vote', 'finish_note']);
        $data['teams'] = Team::get();
        return view('frontend.home.index', $data);
    }

    /**
     * @param Request $request
     * @param $lang
     * @return \Illuminate\Http\RedirectResponse
     */
    public function lang(Request $request, $lang) {
        $language = Language::where('locale', $lang)->first();
        session()->put('lang', $language);
        return redirect()->back();
    }
}
