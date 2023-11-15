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

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $data['candidates1'] = Candidate::orderBy('number')->where('type', 'bem')->get();
        $data['member_count'] = Member::count();
        $data['voting_count'] = Voting::leftJoin('members', 'votings.member_id', '=', 'members.id')->where('votings.type', 'primary')->wherenotnull('candidate_id_1')->count();
        $data['time_end'] = Carbon::now()->gt(Carbon::createFromFormat('Y-m-d H:i:s', '2022-03-25 13:00:00'));


        // Himpunan
        $data['candidates2'] = Candidate::orderBy('number')->where('type', 'him')->get()->groupBy('jurusan');
        $getMemberCountHim = DB::table('members')
            ->select('jurusan', DB::raw('count(*) as total'))
            ->groupBy('jurusan')
            ->get();

        foreach ($getMemberCountHim as $item) {
            $data['member_count_2'][$item->jurusan] = $item->total;
        }



        $getVotingCountHim = DB::table('votings')
            ->select('members.jurusan', DB::raw('count(*) as total'))
            ->leftJoin('members', 'votings.member_id', '=', 'members.id')
            ->where('votings.type', 'primary')
            ->wherenotnull('votings.candidate_id_2')
            ->groupBy('members.jurusan')
            ->get();

        foreach ($getVotingCountHim as $item) {
            $data['voting_count_2'][$item->jurusan] = $item->total;
        }
        // End Himpunan

        // Senator
        $data['candidates3'] = Candidate::orderBy('number')->where('type', 'sen')->get()->groupBy('jurusan');
        $getMemberCountHim = DB::table('members')
            ->select('jurusan', DB::raw('count(*) as total'))
            ->groupBy('jurusan')
            ->get();

        foreach ($getMemberCountHim as $item) {
            $data['member_count_3'][$item->jurusan] = $item->total;
        }



        $getVotingCountHim = DB::table('votings')
            ->select('members.jurusan', DB::raw('count(*) as total'))
            ->leftJoin('members', 'votings.member_id', '=', 'members.id')
            ->where('votings.type', 'primary')
            ->wherenotnull('votings.candidate_id_3')
            ->groupBy('members.jurusan')
            ->get();

        foreach ($getVotingCountHim as $item) {
            $data['voting_count_3'][$item->jurusan] = $item->total;
        }
        // End Senator

        return view('backend.home.index', $data);
    }

    public function chartMemberByState(Request $request)
    {
        try {
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

    public function chartCandidate(Request $request)
    {
        try {
            $list = Candidate::orderBy('number', 'asc')->where('type', 'gub')->get();
            $list->transform(function ($item) {
                return [
                    'label' => $item->name,
                    'value' => $item->voting1_count
                ];
            });
            return sendApiResponse(true, 'list of states', $list);
        } catch (\Exception $e) {
            return sendApiResponse(false, $e->getMessage(), null, 400);
        }
    }

    public function chartCandidate2(Request $request)
    {
        try {
            $list = Candidate::orderBy('number', 'asc')->where('type', 'wagub1')->get();
            $list->transform(function ($item) {
                return [
                    'label' => $item->name,
                    'value' => $item->voting2_count
                ];
            });
            return sendApiResponse(true, 'list of states', $list);
        } catch (\Exception $e) {
            return sendApiResponse(false, $e->getMessage(), null, 400);
        }
    }

    public function chartCandidate3(Request $request)
    {
        try {
            $list = Candidate::orderBy('number', 'asc')->where('type', 'wagub2')->get();
            $list->transform(function ($item) {
                return [
                    'label' => $item->name,
                    'value' => $item->voting3_count
                ];
            });
            return sendApiResponse(true, 'list of states', $list);
        } catch (\Exception $e) {
            return sendApiResponse(false, $e->getMessage(), null, 400);
        }
    }

    public function chartVoteByDay(Request $request)
    {
        try {
            $list = Voting::orderBy('created_at', 'asc')->get();
            $candidateIds = Candidate::orderBy('number')->where('type', 'bem')->get();
            $firstDay = Carbon::parse($list->first()->created_at)->startOfDay();
            $lastDay = Carbon::parse($list->last()->created_at)->endOfDay();
            $diffDays = $lastDay->diffInDays($firstDay);
            $result = [];
            $allDays = [];
            $allVoting = [];
            $candidateVoting = [];

            $candidateIds->transform(function ($item) use ($diffDays, $firstDay) {
                $resultTmp = [];
                for ($i = 0; $i <= $diffDays; $i++) {
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
            for ($i = 0; $i <= $diffDays; $i++) {
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

    public function chartVoteByDay2(Request $request)
    {
        try {
            $list = Voting::orderBy('created_at', 'asc')->get();
            $candidateIds = Candidate::orderBy('number')->where('type', 'dpm')->get();
            $firstDay = Carbon::parse($list->first()->created_at)->startOfDay();
            $lastDay = Carbon::parse($list->last()->created_at)->endOfDay();
            $diffDays = $lastDay->diffInDays($firstDay);
            $result = [];
            $allDays = [];
            $allVoting = [];
            $candidateVoting = [];

            $candidateIds->transform(function ($item) use ($diffDays, $firstDay) {
                $resultTmp = [];
                for ($i = 0; $i <= $diffDays; $i++) {
                    $dateTmp = Carbon::parse($firstDay)->addDay($i);
                    $startTmp = Carbon::parse($dateTmp)->startOfDay();
                    $endTmp = Carbon::parse($dateTmp)->endOfDay();
                    $votingTmp = Voting::where('candidate_id_2', $item->id)->whereBetween('created_at', [$startTmp, $endTmp])->count();
                    array_push($resultTmp, $votingTmp);
                }
                return [
                    'label' => $item->name,
                    'data' => $resultTmp
                ];
            });
            for ($i = 0; $i <= $diffDays; $i++) {
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
