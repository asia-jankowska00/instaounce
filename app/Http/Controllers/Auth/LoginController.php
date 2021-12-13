<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware((['guest']));
    }

    // Shows the login page
    public function index()
    {
        return view('auth.login');
    }

    // Logs user in
    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (!Auth::attempt($request->only('email', 'password'), $request->remember)) {
            return back()->with('status', 'Invalid login credentials');
        }

        return redirect()->route('posts');
    }
}
