<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    // Logs the user out
    public function store()
    {
        Auth::logout();

        return redirect()->route('home');
    }
}
