<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class ItemController extends Controller
{
    //

    public function __construct() {
		$this->middleware('auth');
	}

	public function index() {
		$id = Auth::user();

		return view('layouts.items.index');

	}



}
