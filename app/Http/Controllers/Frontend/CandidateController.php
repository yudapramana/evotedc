<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\Candidate;
use App\Model\Member;
use App\Model\State;
use App\Model\Voting;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    /**
     * show candidate page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        session()->forget(['current_member','finish_vote', 'finish_note']);
        $data['candidates1'] = Candidate::orderBy('number')->where('type','bem')->get();
        $data['candidates2'] = Candidate::orderBy('number')->where('type','him')->get()->groupBy('jurusan');
        $data['vm'] = false;

        return view('frontend.candidates.index', $data);
    }

    /**
     * show candidate page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function result()
    {
        session()->forget(['current_member','finish_vote', 'finish_note']);
        $data['member_count'] = Member::count();
        $data['voting_count'] = Voting::count();
        $data['candidates'] = Candidate::orderBy('number')->get();
        return view('frontend.candidates.result', $data);
    }


    public function chartMemberByState(Request $request) {
        try{
            $list = State::orderBy('name', 'asc')->get();
            $data = [
                'state_label' => $list->pluck('name')->toArray(),
                'state_member' => $list->pluck('member_count')->toArray(),
                'state_voting' => $list->pluck('voting_count')->toArray(),
            ];
            return sendApiResponse(true, 'list of states', $data);
        } catch (\Exception $e) {
            return sendApiResponse(false, $e->getMessage(), null, 400);
        }
    }

    public function chartCandidate(Request $request) {
        try{
            $list = Candidate::orderBy('number', 'asc')->get();
            $list->transform(function ($item) {
                return [
                    'label' => $item->name,
                    'value' => $item->voting_count
                ];
            });
            return sendApiResponse(true, 'list of states', $list);
        } catch (\Exception $e) {
            return sendApiResponse(false, $e->getMessage(), null, 400);
        }
    }

    public function chartVoteByDay(Request $request) {
        try{
            $list = Voting::orderBy('created_at', 'asc')->get();
            $candidateIds = Candidate::orderBy('number')->get();
            $firstDay = Carbon::parse($list->first()->created_at)->startOfDay();
            $lastDay = Carbon::parse($list->last()->created_at)->endOfDay();
            $diffDays = $lastDay->diffInDays($firstDay);
            $result = [];
            $allDays = [];
            $allVoting = [];
            $candidateVoting = [];

            $candidateIds->transform(function ($item) use ($diffDays, $firstDay) {
                $resultTmp = [];
                for($i = 0; $i <= $diffDays; $i++) {
                    $dateTmp = Carbon::parse($firstDay)->addDay($i);
                    $startTmp = Carbon::parse($dateTmp)->startOfDay();
                    $endTmp = Carbon::parse($dateTmp)->endOfDay();
                    $votingTmp = Voting::where('candidate_id_1', $item->id)->whereBetween('created_at', [$startTmp, $endTmp])->count();
                    array_push($resultTmp, $votingTmp);
                }
                return [
                    'label' => $item->name,
                    'data' => $resultTmp
                ];
            });
            for($i = 0; $i <= $diffDays; $i++) {
                $dateTmp = Carbon::parse($firstDay)->addDay($i);
                $startTmp = Carbon::parse($dateTmp)->startOfDay();
                $endTmp = Carbon::parse($dateTmp)->endOfDay();
                $votingTmp = Voting::whereBetween('created_at', [$startTmp, $endTmp])->count();
                array_push($allVoting, $votingTmp);
                array_push($allDays, $dateTmp->format('d/m/Y'));
            }
            $allResult = (object) [
                'label' => 'Semua',
                'data' => $allVoting,
            ];
//            $candidateIds->put($candidateIds->keys()->last()+1, $allResult);
            $data['label'] = $allDays;
            $data['data'] = $candidateIds;
            return sendApiResponse(true, 'list of voting', $data);
        } catch (\Exception $e) {
            return sendApiResponse(false, $e->getMessage(), null, 400);
        }
    }
}
