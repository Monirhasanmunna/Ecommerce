<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function registration()
    {
        return view('frontend.registration');
    }

    public function store(Request $request)
    {
        
        $request->validate([

            'first_name' => 'required|max:50',
            'last_name' => 'required|max:50',
            'user_name' => 'required|max:50',
            'email' => 'required|email|unique:users',
            'address' => 'required',
            'city' => 'required',
            'post_code' => 'required',
            'country' => 'required',
            'phone' => 'required',
            'password' => 'required',

        ]);


        $user = new User();

        $user->role = 'user';
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->user_name = $request->user_name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->city = $request->city;
        $user->post_code = $request->post_code;
        $user->country = $request->country;
        $user->phone = $request->phone;
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect()->back()->with('message', 'You are registration successfully');
    }

    public function login(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->back();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->back();
    }
}
