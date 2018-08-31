<?php

namespace App\Jobs;

use App\Http\Controllers\CommonFunction;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;
use Swift_Mailer;
use Swift_SmtpTransport;



class SendNotificationEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $mailData;
    protected $type;
    public function __construct($mailData,$type)
    {
        //
        $this->mailData = $mailData;
        $this->type = $type;

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if($this->type == CommonFunction::PHO_VUONG_CA_RESERVATION_TYPE) {
            $this->phovuongReservationForm();
        } else if($this->type == CommonFunction::PHO_VUONG_CA_CONTACT_TYPE) {
            $this->phovuongContactForm();
        } else if($this->type == CommonFunction::ANDOLA_NAIL_SPA_CONTACT_TYPE) {
            $this->andolanailspaContactForm();
        } else {

            //
            $mailData = $this->mailData;

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

    private function phovuongContactForm() {
        $mailData = $this->mailData;
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

    private function phovuongReservationForm() {
        $mailData = $this->mailData;
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

    private function andolanailspaContactForm() {
        $mailData = $this->mailData;
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
}
