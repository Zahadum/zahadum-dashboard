<?php

namespace App\Http\Controllers;
use Mail;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    //

    public static function sendNotification($mailData) {
        $to      = 'haitrung01@gmail.com';
        $subject = 'Subscription Update: '.$mailData['name'];
        $message = 'Name: '.$mailData['name']. "<br/>";
        $message .= 'Email: '.$mailData['email']. "<br/>";
        $message .= 'Phone: '.$mailData['phone']. "<br/>";
        $message .= 'People: '.$mailData['people']. "<br/>";
        $message .= 'Reservation: '.$mailData['datetime']. "<br/>";
        $message .= 'Created Date: '.$mailData['date']. "<br/>";
        $message .= 'Note: '.$mailData['note']. "<br/>";
        $headers = 'From: contact@gwennguyen.com' . "\r\n" .
            'Reply-To: From: contact@gwennguyen.com' . "\r\n" .
            "MIME-Version: 1.0\r\n" .
            "Content-Type: text/html; charset=ISO-8859-1\r\n";
        'X-Mailer: PHP/' . phpversion();

        $mailed = mail($to, $subject, $message, $headers);
    }
    public static function sendNotificationContact($mailData) {
        $to      = 'haitrung01@gmail.com';
        $subject = 'Contact Form: '.$mailData['name'];
        $message = 'Name: '.$mailData['name']. "<br/>";
        $message .= 'Email: '.$mailData['email']. "<br/>";
        $message .= 'Phone: '.$mailData['phone']. "<br/>";
        $message .= 'Subject: '.$mailData['subject']. "<br/>";
        $message .= 'Note: '.$mailData['note']. "<br/>";
        $headers = 'From: contact@gwennguyen.com' . "\r\n" .
            'Reply-To: From: contact@gwennguyen.com' . "\r\n" .
            "MIME-Version: 1.0\r\n" .
            "Content-Type: text/html; charset=ISO-8859-1\r\n";
        'X-Mailer: PHP/' . phpversion();

        $mailed = mail($to, $subject, $message, $headers);
    }
}
