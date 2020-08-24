<?php

namespace App\Http\Controllers;
use Brian2694\Toastr\Facades\Toastr;
use App\Paid_Through;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailNotify;

class PaidthroughController extends Controller
{
    //


    public function index(){
    $paidthroughs=Paid_Through::all();
    return view('layouts.paidthrough.index',compact('paidthroughs'));
    }


}
