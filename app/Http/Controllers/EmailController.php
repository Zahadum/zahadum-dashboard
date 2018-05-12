<?php

namespace App\Http\Controllers;
use Mail;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    //

    public static function sendNotification($mailData) {
/*
        Mail::send('emails.PVNotification', $mailData, function($message) use ($mailData) {
            $message->to('haitrung01@gmail.com','Trung Hang');
            $message->subject('Contact from '.$mailData['name']);
            $message->from('contact@phovuong.ca', 'Pho Vuong');
            $message->replyTo('contact@phovuong.ca', 'Pho Vuong');

        });
*/
        $to      = 'haitrung01@gmail.com';
        $subject = 'Subscription Update: ';
        $message = 'hhh';
        $headers = 'From: haitrung01@gmail.com' . "\r\n" .
            'Reply-To: From: haitrung01@gmail.com' . "\r\n" .
            "MIME-Version: 1.0\r\n" .
            "Content-Type: text/html; charset=ISO-8859-1\r\n";
        'X-Mailer: PHP/' . phpversion();

        $mailed = mail($to, $subject, $message, $headers);
    }
}
