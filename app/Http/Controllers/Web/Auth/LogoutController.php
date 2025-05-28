<?php

namespace App\Http\Controllers\Web\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function index()
    {
        Auth::logout();
        session()->flush();

        // Redirect ke login dengan pesan sukses
        return redirect()->route('login')->with('success', 'Anda telah berhasil logout.');
    }
}
