<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    //
    public function TestMethod() {
        var_dump('aaa');
        $mailData['name'] = 'Trung';
        $mailData['email'] = 'trunghangca@gmail.com';
        $mailData['phone'] = '7789226612';
        $mailData['subject'] = 'test';
        $mailData['note'] = 'test note';

        $mailTemplate='';
        $this->dispatch((new \App\Jobs\SendNotificationEmail($mailData,$mailTemplate)));
    }
}
