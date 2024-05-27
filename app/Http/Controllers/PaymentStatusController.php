<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentStatusController extends Controller
{
    public function index(){
        return view('PaymentStatus');
    }
}
