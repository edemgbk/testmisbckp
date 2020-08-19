<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmailDemo;

use Illuminate\Http\Request;
use App\User;
use Notification;
use App\Notifications\MyFirstNotification;
use Symfony\Component\HttpFoundation\Response;

class MailController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function sendEmail() {
        $email = 'edemgbk1@gmail.com';

        $mailData = [
            'title' => 'Demo Email',
            'url' => 'https://www.positronx.io'
        ];

        Mail::to($email)->send(new EmailDemo($mailData));

        return response()->json([
            'message' => 'Email has been sent.'
        ], Response::HTTP_OK);
    }


    public function sendNotification()
    {
        $user = User::first();

        $details = [
            'greeting' => 'Hi Artisan',
            'body' => 'This is my first notification from ItSolutionStuff.com',
            'thanks' => 'Thank you for using ItSolutionStuff.com tuto!',
            'actionText' => 'View My Site',
            'actionURL' => url('/'),
            'order_id' => 101
        ];

        Notification::send($user, new MyFirstNotification($details));

        dd('done');
    }



}
