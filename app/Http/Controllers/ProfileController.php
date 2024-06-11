<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransactionDetail;
use App\Models\TransactionHeader;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index(){
        $userId = Auth::user()->id;
        $history = TransactionHeader::with(['events', 'details'])
            ->where('users_id', $userId)
            ->get();

        return view('ProfilePage', ['history' => $history]);
    }
}
