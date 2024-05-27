<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index(){
        $totalPrice = session()->get('totalPrice');
        return view('PaymentPage', ['totalPrice' => $totalPrice]);
    }
}
