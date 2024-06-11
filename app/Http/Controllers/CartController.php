<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Event;
use App\Models\EventCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class CartController extends Controller
{
    public function index(){
        $userId = Auth::user()->id;
        $cart = Cart::with(['events'])
                ->where('users_id', $userId)
                ->get();
        $totalPrice = 0;
        foreach ($cart as $carts) {
            foreach ($carts->events as $event) {
                $totalPrice += $event->Price * $carts->Quantity;
            }
        }
        Session::put('totalPrice', $totalPrice);
        return view('ShoppingCartPage', ['eventCart' => $cart, 'totalPrice' => $totalPrice]);
    }

    public function addToCart(Request $request) {
        $eventId = $request->input('event_id');
        $event = Event::find($eventId);

        if (!$event) {
            return response()->json(['message' => 'Event not found'], 404);
        }

        $userId = Auth::user()->id; // Assuming user is authenticated
        // $userId = 2;

        // Check if the event is already in the cart
        $cartItem = Cart::where('events_id', $eventId)->where('users_id', $userId)->first();

        if ($cartItem) {
            // If the event is already in the cart, increment the quantity
            $cartItem->Quantity += 1;
            $cartItem->save();
        } else {
            // If the event is not in the cart, create a new cart item
            $cart = new Cart();
            $cart->events_id = $event->id;
            $cart->users_id = $userId;
            $cart->quantity = 1; // Initial quantity
            $cart->save();
            $cart->events()->attach($event->id);
        }

        return response()->json(['message' => 'Event added to cart successfully!']);
    }

    public function updateQuantity(Request $request){
        $userId = Auth::user()->id;
        $cartItem = Cart::where('id', $request->cart_id)->where('users_id', $userId)->first();
        if ($cartItem) {
            $cartItem->Quantity = $request->quantity;
            $cartItem->save();  
            return response()->json(['message' => 'Quantity updated successfully']);
        }
    }
    public function deleteItem(Request $request)
    {
        $userId = Auth::user()->id;
        $cartItem = Cart::where('id', $request->cart_id)->where('users_id', $userId)->first();

        EventCart::where('carts_id', $cartItem->id)->delete();
        if ($cartItem) {
            $cartItem->delete();
            return response()->json(['message' => 'Item deleted successfully']);
        }
    }
}
