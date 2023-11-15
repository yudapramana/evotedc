<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\Candidate;
use App\Model\Member;
use App\Model\MemberValidation;
use App\Model\Voting;
use App\Model\VotingMessage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use RealRashid\SweetAlert\Facades\Alert;

class VoteController extends Controller
{
    /**
     * show vote page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data['current_member'] = null;
        if (session('current_member')) {
            $data['current_member'] = session('current_member');
            $voting = Voting::where('member_id', $data['current_member']->id)
                ->first();
            if ($voting && $voting->candidate_id_2 != null && $voting->candidate_id_3 != null) {
                $data['current_member'] = null;
                session()->forget(['current_member','finish_vote', 'finish_note']);
            }
        }
        // Data Development
        $schedule = \App\Model\Schedule::first();
        if($schedule) {
            $data['start_time'] = Carbon::createFromFormat('Y-m-d H:i:s', $schedule->start_time);
            $data['end_time'] = Carbon::createFromFormat('Y-m-d H:i:s', $schedule->end_time);
        } else {
            $data['start_time'] = Carbon::createFromFormat('Y-m-d H:i:s', '2020-11-01 08:00:00');
            $data['end_time'] = Carbon::createFromFormat('Y-m-d H:i:s', '2023-11-01 16:00:00');
        }
        

        // Data Production
        // $data['start_time'] = Carbon::createFromFormat('Y-m-d H:i:s', '2022-11-01 08:00:00');
        // $data['end_time'] = Carbon::createFromFormat('Y-m-d H:i:s', '2022-11-01 16:00:00');
        return view('frontend.vote.index', $data);
    }

    /**
     * show cek daftar pemilih
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function checkMember()
    {
        $data['current_member'] = null;
        if (session('current_member')) {
            $data['current_member'] = session('current_member');
//            $voting = Voting::where('member_id', $data['current_member']->id)
//                ->first();
//            if($voting) {
//                $data['current_member'] = null;
//                session()->forget(['current_member','finish_vote', 'finish_note']);
//            }
        }
        return view('frontend.vote.check', $data);
    }

    /**
     * show detail vote page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function detail(Request $request)
    {
        if (!session('current_member')) {
            $validator = Validator::make($request->all(), []);
            $validator->errors()->add('member', 'silakan lakukan validasi data terlebih dahulu');
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $data['current_member'] = session('current_member');
        $data['candidates1'] = Candidate::orderBy('number')->where('type', 'bem')->get();
        $data['candidates2'] = Candidate::orderBy('number')->where('type', 'him')->where('jurusan', $data['current_member']->jurusan)->get();
        $data['candidates3'] = Candidate::orderBy('number')->where('type', 'sen')->where('jurusan', $data['current_member']->jurusan)->get();
        $data['jurusan'] = $data['current_member']->jurusan;
        // $data['candidates2'] = Candidate::orderBy('number')->where('type', session('current_member')->type)->get();

        $voting = Voting::where('member_id', $data['current_member']->id)
        ->where('type', 'primary')
        ->first();

        if ($voting) {
            if (!$voting->candidate_id_2) {
                return view('frontend.vote.detail_2', $data);
            } elseif (!$voting->candidate_id_3) {
                return view('frontend.vote.detail_3', $data);
            } else {
                return view('frontend.vote.detail', $data);
            }
        } else {
            return view('frontend.vote.detail', $data);
        }
    }

    /**
     * check member validation
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function check(Request $request)
    {
        try {
            session()->forget(['current_member','finish_vote', 'finish_note']);
            $validator = Validator::make($request->all(), [
                'nim' => 'required',
                'voter_key' => 'required',
            ], [
                'nim.required' => 'nim harus diisi!',
                'voter_key.required' => 'Voter key harus diisi!',
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $member = Member::where('nim', strtolower(request('nim')))
                ->where('voter_key', request('voter_key'))
                ->first();
            if (!$member) {
                $validator->errors()->add('member', 'Pastikan data anda benar');
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $voting = Voting::where('member_id', $member->id)
                ->where('type', 'primary')
                ->first();

            if ($voting && $voting->candidate_id_1 != null && $voting->candidate_id_2 != null && $voting->candidate_id_3 != null) {
                $validator->errors()->add('member', 'Maaf voting hanya dilakukan sekali saja!');
                return redirect()->back()->withErrors($validator)->withInput();
            } 
            // else {
            //     $data = [
            //         'member' => $member,
            //         'voting' => $voting
            //     ];
            //     return $data;
            // }

            session()->put('current_member', $member);
            return redirect()->back();
        } catch (\Exception $e) {
            Alert::error('Error', $e->getMessage());
            return redirect()->back();
        }
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function checkMemberData(Request $request)
    {
        try {
            session()->forget(['current_member','finish_vote', 'finish_note']);
            $validator = Validator::make($request->all(), [
                'email' => 'required',
                'voter_key' => 'required',
            ], [
                'email.required' => 'Email harus diisi!',
                'voter_key.required' => 'Voter key harus diisi!',
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $member = Member::where('email', strtolower(request('email')))
                ->where('voter_key', request('voter_key'))
                ->first();
            if (!$member) {
                $validator->errors()->add('member', 'Pastikan data anda benar');
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $voting = Voting::where('member_id', $member->id)
                ->where('type', 'primary')
                ->first();
            if ($voting) {
                $validator->errors()->add('member', 'Maaf voting hanya dilakukan sekali saja!');
                return redirect()->back()->withErrors($validator)->withInput();
            }
            MemberValidation::updateOrCreate([
                'member_id' => $member->id
            ]);
            session()->flash('current_member', $member);
            return redirect()->back();
        } catch (\Exception $e) {
            Alert::error('Error', $e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * store data to database
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        try {
            /** cek validasi */
            $current_member = session('current_member');
            if (!$current_member) {
                Alert::error('Error', 'Waktu habis, silakan lakukan validasi lagi!');
                return redirect(route('home.vote'));
            }

            $validator = Validator::make($request->all(), [
                'candidate1' => 'required|exists:candidates,id',
            ], [
                'candidate1.required' => 'Harap masukan pilihan terlebih dahulu!',
                'candidate1.exists' => 'Pastikan pilihan kandidat anda!',
            ]);

            if ($validator->fails()) {
                Alert::warning('Perhatian', $validator->errors()->first());
                return redirect()->back();
            }

            /** cek is vote before */
            $voting = Voting::where('member_id', $current_member->id)
                ->first();
            if ($voting) {
                Alert::error('Error', 'Maaf anda telah melakukan voting!');
                return redirect(route('home.vote'));
            }

            Voting::create([
                'candidate_id_1' => request('candidate1'),
                'ip' => $this->getIp(),
                'type' => 'primary',
                'member_id' => $current_member->id
            ]);

            // session()->put('finish_vote', true);
            Alert::success('Berhasil', 'Voting anda telah diterima!');
            return redirect()->back();
        } catch (\Exception $e) {
            Alert::error('Error', $e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * store data to database
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store2(Request $request)
    {
        try {
            /** cek validasi */
            $current_member = session('current_member');
            if (!$current_member) {
                Alert::error('Error', 'Waktu habis, silakan lakukan validasi lagi!');
                return redirect(route('home.vote'));
            }

            $validator = Validator::make($request->all(), [
                'candidate2' => 'required|exists:candidates,id',
            ], [
                'candidate2.required' => 'Harap masukan pilihan terlebih dahulu!',
                'candidate2.exists' => 'Pastikan pilihan kandidat anda!',
            ]);

            if ($validator->fails()) {
                Alert::warning('Perhatian', $validator->errors()->first());
                return redirect()->back();
            }

            /** cek is vote before */
            $voting = Voting::where('member_id', $current_member->id)
                            ->whereNull('candidate_id_2')
                ->first();

            if ($voting) {
                $voting->update(['candidate_id_2' => request('candidate2')]);
            } else {

                if($voting->candidate_id_3 == null) {
                    return redirect(route('home.vote.detail'));
                } else {
                    Alert::error('Error', 'Maaf anda telah melakukan voting!');
                    return redirect(route('home.vote'));
                }
                
            }

            $voting->fresh();
            if($voting->candidate_id_3 != null) {
                session()->put('finish_vote', true);
            }
            Alert::success('Berhasil', 'Voting anda telah diterima!');
            return redirect()->back();
        } catch (\Exception $e) {
            Alert::error('Error', $e->getMessage());
            return redirect()->back();
        }
    }

     /**
     * store data to database
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store3(Request $request)
    {
        try {
            /** cek validasi */
            $current_member = session('current_member');
            if (!$current_member) {
                Alert::error('Error', 'Waktu habis, silakan lakukan validasi lagi!');
                return redirect(route('home.vote'));
            }

            $validator = Validator::make($request->all(), [
                'candidate3' => 'required|exists:candidates,id',
            ], [
                'candidate3.required' => 'Harap masukan pilihan terlebih dahulu!',
                'candidate3.exists' => 'Pastikan pilihan kandidat anda!',
            ]);

            if ($validator->fails()) {
                Alert::warning('Perhatian', $validator->errors()->first());
                return redirect()->back();
            }

            /** cek is vote before */
            $voting = Voting::where('member_id', $current_member->id)
                            ->whereNull('candidate_id_3')
                ->first();

            if ($voting) {
                $voting->update(['candidate_id_3' => request('candidate3')]);
            } else {
                Alert::error('Error', 'Maaf anda telah melakukan voting!');
                return redirect(route('home.vote'));
            }
            $voting->fresh();
            if($voting->candidate_id_2 != null) {
                session()->put('finish_vote', true);
            }
            Alert::success('Berhasil', 'Voting anda telah diterima!');
            return redirect()->back();
        } catch (\Exception $e) {
            Alert::error('Error', $e->getMessage());
            return redirect()->back();
        }
    }

    public function getIp()
    {
        foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key) {
            if (array_key_exists($key, $_SERVER) === true) {
                foreach (explode(',', $_SERVER[$key]) as $ip) {
                    $ip = trim($ip); // just to be safe
                    if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false) {
                        return $ip;
                    }
                }
            }
        }
        return request()->ip(); // it will return server ip when no client ip found
    }
}
