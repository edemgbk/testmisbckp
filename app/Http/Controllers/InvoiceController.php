<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
class InvoiceController extends Controller
{
//

    public function __construct() {
		$this->middleware('auth');
	}

	public function index() {
        $id = Auth::user();

		 $Invoices;
  return view('layouts.invoices.index');
	}
}
