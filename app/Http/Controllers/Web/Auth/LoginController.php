<?php

namespace App\Http\Controllers\Web\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('dashboard');
        }

        if (Auth::guard('ormawa')->check()) {
            return redirect()->route('beranda');
        }

        return view('pages.Auth.Login.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'password' => 'required|string|min:6',
        ]);

        $credentials = $request->only('name', 'password');

        if (Auth::guard('admin')->attempt(['name' => $credentials['name'], 'password' => $request->password])) {
            return redirect()->route('dashboard');
        }

        if (Auth::guard('ormawa')->attempt(['name' => $credentials['name'], 'password' => $request->password])) {
            return redirect()->route('beranda');
        }

        return redirect()->back()->with('error', 'Username atau kata sandi salah')->withInput();
    }
}
