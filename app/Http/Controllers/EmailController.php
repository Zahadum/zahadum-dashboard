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
            $message->from('contact@gwennguyen.com', 'Pho Vuong');
            $message->replyTo('contact@phovuong.ca', 'Pho Vuong');

        });
*/
        $to      = $mailData['email'];
        $subject = 'Subscription Update: '.$mailData['name'];
        $message = 'Name: '.$mailData['name'];
        $message .= 'Email: '.$mailData['email'];
        $message .= 'Phone: '.$mailData['phone'];
        $message .= 'People: '.$mailData['people'];
        $message .= 'Reservation: '.$mailData['datetime'];
        $message .= 'Created Date: '.$mailData['date'];
        $headers = 'From: contact@gwennguyen.com' . "\r\n" .
            'Reply-To: From: contact@gwennguyen.com' . "\r\n" .
            "MIME-Version: 1.0\r\n" .
            "Content-Type: text/html; charset=ISO-8859-1\r\n";
        'X-Mailer: PHP/' . phpversion();

        $mailed = mail($to, $subject, $message, $headers);
    }
}
