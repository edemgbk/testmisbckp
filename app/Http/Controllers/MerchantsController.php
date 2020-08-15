<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MerchantsController extends Controller
{
    //

    public function __construct() {
		$this->middleware('auth');
	}

	public function index() {
        $id = Auth::user();

		 $Invoices;
  return view('layouts.merchants.index');
	}
}
