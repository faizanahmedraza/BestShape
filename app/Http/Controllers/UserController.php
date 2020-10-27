<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function edit(User $user)
    {
        return view('auth.passwords.reset', compact('user'));
    }

    public function reset($email)
    {
        $user = User::find($email);
        $user->update($this->validateUser());
        return redirect('/home');
        
    }

    public function validateUser()
    {
        return request()->validate([
            'email' => 'required',
            'password' => 'required|min:8|string|confirmed',
            'password_confirmation' => 'required'
        ]);
    }
}