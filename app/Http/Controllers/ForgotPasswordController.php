<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\User;

class ForgotPasswordController extends Controller {

    public function showForgotPasswordForm() {
        return view('auth.forgot-password');
    }


    public function sendResetLinkEmail(Request $request) {
        $request->validate(['email' => 'required|email|exists:users,email']);


        return redirect()->route('password.request')->with('status', 'Password reset link sent!');
    }
}
