<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(){
        $cart = Cart::with(['events'])->get();
        $totalPrice = 0;
        foreach ($cart as $carts) {
            foreach ($carts->events as $event) {
                $totalPrice += $event->Price;
            }
        }
        session()->put('totalPrice', $totalPrice);
        return view('ShoppingCartPage', ['eventCart' => $cart, 'totalPrice' => $totalPrice]);
    }
}
