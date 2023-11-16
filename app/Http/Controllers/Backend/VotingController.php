<?php

namespace App\Http\Controllers\Backend;

use App\Exports\VotingExport;
use App\Http\Controllers\Controller;
use App\Model\Member;
use App\Model\Voting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class VotingController extends Controller
{
    public $route_index = 'voting';
    public $view_folder = 'backend.voting';

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
        $list = Voting::select(DB::raw('*, count(*) as voting_count'))->groupBy('member_id');
        if($keyword) {
            $list->whereHas('member', function ($query)  use ($keyword){
                return $query->where('name', 'like', '%' . $keyword . '%');
            });
            $params['keyword'] = $keyword;
        } else {
            $list->orderBy('voting_count', 'desc');
            $list->orderBy('created_at', 'desc');
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

    public function export() {
        $list = Voting::select(DB::raw('*, count(*) as voting_count'))->groupBy('member_id')
            ->orderBy('voting_count', 'desc')
            ->orderBy('created_at', 'desc')->get();
        $list->transform(function($item) {
            $result = [
                'no_induk_lpdp' => "'".$item->member->no_induk_lpdp,
                'nama' => $item->member->name,
                'email' => $item->member->email,
                'academic_status' => $item->member->academic_status,
                'studi' => $item->member->study->name,
                'jenis_kelamin' => $item->member->gender == 'l' ? 'Laki - laki' : 'Perempuan',
                'provinsi' => $item->member->state ? $item->member->state->name : '-',
                'jumlah_suara' => $item->voting_count,
                'nomor_pilihan' => $item->candidate->number,
                'nama_pilihan' => $item->candidate->name,
                'waktu_voting' => $item->created_at->format('d-m-Y H:i:s'),
                'validasi' => count($item->member->validations) > 0 ? 'Ya' : 'Tidak',
                'waktu_validasi' => count($item->member->validations) > 0 ? $item->member->validations->first()->created_at->format('d-m-Y H:i:s') : '-',
                'pesan' => $item->member->message ? $item->member->message->message : '-'
            ];
            return $result;
        });

        return Excel::download(new VotingExport($list), 'e-voting matagaruda 2020.xlsx');
    }

    public function generate() {
        $list = Voting::select(DB::raw('*, count(*) as voting_count'))->with('member')->groupBy('member_id')
            ->orderBy('voting_count', 'desc')
            ->orderBy('created_at', 'desc')->get();



        return $list;
        $list->transform(function ($item, $key) {
            
            $result = [
                'no' => $key+1,
                'waktu_voting' => $item->created_at->format('d-m-Y H:i:s'),
                'nama' => $item->member->name,
                'nim' => "'".$item->member->nim,
                'jurusan' => $item->member->jurusan,
                'angkatan' => $item->member->angkatan,
                'candidate_1' => ($item->candidate_id_1 != null) ? 'Sudah' : 'Belum',
                'candidate_2' => ($item->candidate_id_2 != null) ? 'Sudah' : 'Belum',
                'candidate_3' => ($item->candidate_id_3 != null) ? 'Sudah' : 'Belum',
            ];
            return $result;
        });

        // return $list;

        return Excel::download(new VotingExport($list), 'e-voting UNDIP 2023.xlsx');
    }
}
