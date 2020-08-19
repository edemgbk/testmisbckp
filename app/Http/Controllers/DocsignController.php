<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;

use Illuminate\Http\Request;

class DocsignController extends Controller
{
    //




    public function __construct() {
		$this->middleware('auth');
	}

	public function index() {
        $id = Auth::user();

		 $Invoices;
  return view('layouts.docsign.index');
    }

    public function signForm() {
        $id = Auth::user();

		 $Invoices;
  return view('layouts.docsign.signForm');
    }

    public function sign() {
        $id = Auth::user();

		 $Invoices;
  return view('layouts.docsign.sign');
    }



}
