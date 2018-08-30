<?php

namespace App\Jobs;

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
    protected $mailTemplate;
    public function __construct($mailData,$mailTemplate)
    {
        //
        $this->mailData = $mailData;
        $this->mailTemplate = $mailTemplate;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        //
        $mailData = $this->mailData;
        $mailTemplate = $this->mailTemplate;

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
