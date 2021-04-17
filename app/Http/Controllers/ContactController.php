<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
class ContactController extends Controller
{
    //
    public function sendMail(){

        $to_name = 'Ganza Respice';
        $to_emails = 'respinho2014@gmail.com';

        $data = array('name'=>'Ogbonna Vitalis(sender_name)', 'body' => 'A test mail');

        Mail::send('emails.contact', $data, function($message) use ($to_name, $to_emails) {
        $message->to($to_emails, $to_name)
        ->subject('Laravel Test Mail');
        $message->from(env('MAIL_FROM_ADDRESS'),'Test Mail');
        });
    }

    public function sendMailWithMarkDown(){

        $to_emails = 'respinho2014@gmail.com';

        $details = array('name'=>'Ogbonna Vitalis(sender_name)', 'body' => 'A test mail','url'=>'https://www.itsolutionstuff.com/post/laravel-8-markdown-laravel-8-send-email-using-markdown-exampleexample.html');
      
        Mail::to($to_emails)->send(new ContactMail($details));

        return 'successful';
    }
}
