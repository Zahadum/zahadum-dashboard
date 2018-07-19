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
            'key' => 'required',
        ]);
        if($pledge["key"]=='123') {
            return ['status'=>'Success'];
        }
        return ['status'=>'failed'];
    }
}
