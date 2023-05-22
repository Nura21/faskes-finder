<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\AuthRequest;
use App\Models\User;

class AuthController extends Controller
{
    public function login(AuthRequest $request)
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            $user = User::where('email', $request->email)
                ->first();

            if (!empty($user) && Hash::check($request->password, $user->password)) {
                return redirect('dashboard')
                    ->with("success", 'Berhasil Login');
            }

            return back()
                ->with('message', 'Failed! Invalid password');
        }

        return redirect('login')
            ->withInput()
            ->with([
                'message' => 'Check your email again!'
            ]);
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();

        return redirect('login');
    }
}
