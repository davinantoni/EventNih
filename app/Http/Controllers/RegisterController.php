<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\RegisterFormRequest;

class RegisterController extends Controller
{
    public function create(){
        return view('Register');
    }

    public function store(RegisterFormRequest $request){
        $user = new User;
        $user->name = $request->name;
        $user->role_id = 2;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->email_verified_at = Carbon::now();
        $user->remember_token = Str::random(10);
        $user->created_at = Carbon::now();
        $user->updated_at = Carbon::now();

        Session::flash('status', 'success');
        Session::flash('message', 'User successfully registered!');

        $user->save();
        Auth::login($user);
        $request->session()->regenerate();
        return redirect()->intended('/');
    }
}
