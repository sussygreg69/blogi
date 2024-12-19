<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ResetPasswordController extends Controller {
    public function reset(Request $request) {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|confirmed|min:8',
        ]);


        $user = User::where('email', $request->email)->first();


        $user->password = Hash::make($request->password);
        $user->save();

        Auth::login($user);

        return redirect()->route('home')->with('status', 'Password reset successfully!');
    }
}
