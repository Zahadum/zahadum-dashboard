<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    //
    public function TestMethod() {
        var_dump('aaa');
        $mailData=[];
        $mailTemplate=[];
        $this->dispatch((new \App\Jobs\SendNotificationEmail($mailData,$mailTemplate)));
    }
}
