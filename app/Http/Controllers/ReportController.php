<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    //

    public function __construct() {
		$this->middleware('auth');
	}

	public function index() {
        $id = Auth::user();

		 $Invoices;
  return view('layouts.reports.index');
    }

    public function view() {
        $id = Auth::user();

		 $Invoices;
  return view('layouts.reports.view');
    }
}
