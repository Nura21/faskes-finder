<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::query()
            ->select(['email', 'password', 'remember_token', 'created_at'])
            ->get();

        return view('manages.user.index', compact("users"));
    }
}
