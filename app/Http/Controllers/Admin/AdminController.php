<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index() : View
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->with('error', 'Invalid login credentials');
        }

        Auth::login($user);

        return redirect(route('admin.booking.index'));
    }

    public function logout(Request $request)
    {
        Auth::logout();
 
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        auth()->logout();

        return redirect(route('admin.login'));
    }
}
