<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\TransactionDetail;
use App\Models\TransactionHeader;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller
{
    public function index(){
        $totalPrice = Session::get('totalPrice');
        return view('PaymentPage', ['totalPrice' => $totalPrice]);
    }

    public function store(Request $request)
    {
        // $userId = Auth::id();
        $userId = Auth::user()->id;
        // $paymentMethod = $request->input('payment_method'); // Mendapatkan metode pembayaran yang dipilih

        $carts = Cart::where('users_id', $userId)->get();
        // $totalPrice = 0;

        // // Hitung total harga
        // foreach ($carts as $cart) {
        //     $totalPrice += $cart->quantity * $cart->event->price; // Asumsikan ada atribut 'price' dalam tabel 'events'
        // }

        // Buat header transaksi
        $transactionHeader = new TransactionHeader();
        $transactionHeader->users_id = $userId;
        $transactionHeader->TransactionDate = now(); 
        $transactionHeader->Status = "Handled";
        $transactionHeader->save();

        // Buat detail transaksi
        foreach ($carts as $cart) {
            $transactionDetail = new TransactionDetail();
            $transactionDetail->transactionHeaders_Id = $transactionHeader->id;
            $transactionDetail->events_id = $cart->events_id;
            $transactionDetail->Quantity = $cart->Quantity;
            $transactionDetail->save();
        }

        // Hapus keranjang setelah pembayaran berhasil
        foreach ($carts as $cart) {
            $cart->events()->detach();
        }
        Cart::where('users_id', $userId)->delete();

        return redirect()->route('PaymentStatus');
    }
}
