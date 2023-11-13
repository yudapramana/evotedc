<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\City;
use App\Model\State;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    public function states(Request $request) {
        try{
            $list = State::orderBy('name', 'asc')->get();
            return sendApiResponse(true, 'list of states', $list);
        } catch (\Exception $e) {
            return sendApiResponse(false, $e->getMessage(), null, 400);
        }
    }

    public function cities(Request $request) {
        try{
            $list = City::where('state_id', request('state_id'))->orderBy('name', 'asc')->get();
            return sendApiResponse(true, 'list of cities', $list);
        } catch (\Exception $e) {
            return sendApiResponse(false, $e->getMessage(), null, 400);
        }
    }
}
