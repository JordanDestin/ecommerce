<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;


class LoginController extends Controller
{



    public function index()
    {
        return view('back.auth.loginadmin');
    }

    public function loginAdmin(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'admin' => 1])) {
            return redirect()->route('shop.index');
        }
        else
        {
            return redirect()->route('home');
        }
    }

    public function logoutAdmin(Request $request) {
        Auth::logout();
        return redirect()->route('home');
      }
}
