<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PledgeController extends Controller
{
    //
    public function receive(Request $request) {
        $pledge = $this->validate($request,[
            'cardnumber' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'key' => '123',
        ]);
        if($pledge["key"]=='123') {
            return ['status'=>'Success'];
            return $reservationResource;
        }
        return ['status'=>'failed'];
    }
}
