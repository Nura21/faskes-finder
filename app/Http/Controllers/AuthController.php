<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\AuthRequest;
use App\Models\User;
use App\Models\HealthFacilities;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login(AuthRequest $request)
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            $user = User::where('email', $request->email)->first();

            if (!empty($user) && Hash::check($request->password, $user->password)) {

                return view('dashboard')->with([
                    "success" => 'Berhasil Login',
                    "users" => count(User::all()),
                    "healths" => count(HealthFacilities::all()),
                ]);
            }

            return back()->with('message', 'Failed! Invalid password');
        }

        return redirect('login')->withInput()->with("message", 'Check your email again!');
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();

        return redirect('login');
    }
}
