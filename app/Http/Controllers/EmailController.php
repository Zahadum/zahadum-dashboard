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

        $transport = (new Swift_SmtpTransport(env('MAIL_HOST_PHOVUONG'), 465, 'ssl'));
        $transport->setUsername(env('MAIL_USERNAME_PHOVUONG'));
        $transport->setPassword(env('MAIL_PASSWORD_PHOVUONG'));

        // Assign a new SmtpTransport to SwiftMailer
        $phovuongca = new Swift_Mailer($transport);

        // Assign it to the Laravel Mailer
        Mail::setSwiftMailer($phovuongca);

        Mail::send('emails.PVNotification', $mailData, function ($message) use ($mailData) {
            $message->to('phovuongca@gmail.com');
            //$message->to('haitrung01@gmail.com');
            $message->subject('Reservation(phovuong.ca): '.$mailData['name']);
            $message->from('contact@phovuong.ca', 'Pho Vuong');
        });
    }
    public static function sendNotificationContact($mailData) {



        $transport = (new Swift_SmtpTransport(env('MAIL_HOST_PHOVUONG'), 465, 'ssl'));
        $transport->setUsername(env('MAIL_USERNAME_PHOVUONG'));
        $transport->setPassword(env('MAIL_PASSWORD_PHOVUONG'));

        // Assign a new SmtpTransport to SwiftMailer
        $phovuongca = new Swift_Mailer($transport);

        // Assign it to the Laravel Mailer
        Mail::setSwiftMailer($phovuongca);

        Mail::send('emails.ContactNotification', $mailData, function ($message) use ($mailData) {
            $message->to('phovuongca@gmail.com');
            //$message->to('haitrung01@gmail.com');
            $message->subject('Contact(phovuong.ca): '.$mailData['name']);
            $message->from('contact@phovuong.ca', 'Pho Vuong');
        });
    }
    public static function andolaSendNotificationContact($mailData) {


        $transport = (new Swift_SmtpTransport(env('MAIL_HOST_ANDOLANAILSPA'), 465, 'ssl'));
        $transport->setUsername(env('MAIL_USERNAME_ANDOLANAILSPA'));
        $transport->setPassword(env('MAIL_PASSWORD_ANDOLANAILSPA'));

        // Assign a new SmtpTransport to SwiftMailer
        $andolanailspaca = new Swift_Mailer($transport);

        // Assign it to the Laravel Mailer
        Mail::setSwiftMailer($andolanailspaca);

        Mail::send('emails.ContactNotification', $mailData, function ($message) use ($mailData) {
            $message->to('andola.nailspa@gmail.com');
            //$message->to('haitrung01@gmail.com');
            $message->subject('Contact(andolanailspa.ca): '.$mailData['name']);
            $message->from('contact@andolanailspa.ca', 'Andola Nail Spa');
        });
    }
    public static function vinacastudySendNotificationContact($mailData) {

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
