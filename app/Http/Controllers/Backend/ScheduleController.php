<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\Candidate;
use App\Model\Member;
use App\Model\State;
use App\Model\Voting;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;

class ScheduleController extends Controller
{
    public function index(Request $request) {

        return view('backend.schedules.index');
    }

    public function update(Request $request) {


        $data = $request->input();

        $schedule = \App\Model\Schedule::where('id', $data['schedule_id'])->first();

        if($schedule) {
            $schedule->event = $data['event'];
            $schedule->start_time = $data['start_time'];
            $schedule->end_time = $data['end_time'];
            $schedule->save();
        }

        return redirect()->back()->with(['message' => 'Jadwal dari event berhasil diubah']);

    }

  
}
