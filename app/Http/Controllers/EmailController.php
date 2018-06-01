<?php

namespace App\Http\Controllers;
use Mail;
use Illuminate\Http\Request;
use Swift_Mailer;
use Swift_SmtpTransport;

class EmailController extends Controller
{
    //

    public static function sendNotification($mailData) {
        $to      = 'phovuongca@gmail.com';
        $subject = 'Reservation(phovuong.ca): '.$mailData['name'];
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
        $to      = 'phovuongca@gmail.com';
        $subject = 'Contact(phovuong.ca): '.$mailData['name'];
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
    public static function andolaSendNotificationContact($mailData) {
        $to      = 'andola.nailspa@gmail.com';
        $subject = 'Contact(andolanailspa.ca): '.$mailData['name'];
        $message = 'Name: '.$mailData['name']. "<br/>";
        $message .= 'Email: '.$mailData['email']. "<br/>";
        $message .= 'Note: '.$mailData['note']. "<br/>";
        $headers = 'From: contact@gwennguyen.com' . "\r\n" .
            'Reply-To: From: contact@gwennguyen.com' . "\r\n" .
            "MIME-Version: 1.0\r\n" .
            "Content-Type: text/html; charset=ISO-8859-1\r\n";
        'X-Mailer: PHP/' . phpversion();

        $mailed = mail($to, $subject, $message, $headers);
    }
    public static function vinacastudySendNotificationContact($mailData) {
        /*$to      = 'haitrung01@gmail.com';
        $subject = 'Contact(vinacastudy.com): '.$mailData['name'];
        $message = 'Name: '.$mailData['name']. "<br/>";
        $message .= 'Email: '.$mailData['email']. "<br/>";
        $message .= 'Note: '.$mailData['note']. "<br/>";
        $headers = 'From: contact@zahadum.tk' . "\r\n" .
            'Reply-To: From: contact@zahadum.tk' . "\r\n" .
            "MIME-Version: 1.0\r\n" .
            "Content-Type: text/html; charset=ISO-8859-1\r\n";
        'X-Mailer: PHP/' . phpversion();

        $mailed = mail($to, $subject, $message, $headers);*/
        $transport = (new Swift_SmtpTransport(env('MAIL_HOST_PHOVUONG'), 465, 'ssl'));
        $transport->setUsername(env('MAIL_USERNAME_PHOVUONG'));
        $transport->setPassword(env('MAIL_PASSWORD_PHOVUONG'));

        // Assign a new SmtpTransport to SwiftMailer
        $phovuongca = new Swift_Mailer($transport);

        // Assign it to the Laravel Mailer
        Mail::setSwiftMailer($phovuongca);

        Mail::send('emails.ContactNotification', $mailData, function ($message) use ($mailData) {
            $message->to('haitrung01@gmail.com');
            $message->subject('Contact from zahadum.tk');
            $message->from('contact@phovuong.ca', 'Pho Vuong');
            $message->replyTo('contact@phovuong.ca', 'Pho Vuong');
        });
    }
}
