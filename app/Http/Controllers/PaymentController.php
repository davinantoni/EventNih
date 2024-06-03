<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index(){
        $totalPrice = Session::get('totalPrice');
        return view('PaymentPage', ['totalPrice' => $totalPrice]);
    }
}
