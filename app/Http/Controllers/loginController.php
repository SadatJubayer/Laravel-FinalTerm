<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class loginController extends Controller
{
    function index()
    {
        return view('login');
    }
    function validateUser(Request $request)
    {
        if ($request->username == $request->password) {
            return redirect('/home');
        } else {
            return redirect('/login');
        }
    }
}
