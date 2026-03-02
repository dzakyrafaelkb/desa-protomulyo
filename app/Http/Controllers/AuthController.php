<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function showLogin()
    {
        if (session('admin')) return redirect()->route('admin.dashboard');
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);
        $user = DB::table('users')
            ->where('username', $request->username)
            ->where('password', $request->password)
            ->first();
        if ($user) {
            session(['admin' => (array) $user]);
            return redirect()->route('admin.dashboard');
        }
        return back()->with('error', 'Username atau Password salah!');
    }

    public function logout(Request $request)
    {
        $request->session()->forget('admin');
        return redirect()->route('login');
    }
}
