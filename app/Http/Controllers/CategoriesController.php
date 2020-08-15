<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    //



    public function __construct() {
		$this->middleware('auth');
	}

	public function index() {
        $id = Auth::user();

		 $Invoices;
  return view('layouts.categories.index');
    }

    public function view() {
        $id = Auth::user();

		 $Invoices;
  return view('layouts.categories.view');
    }

}
