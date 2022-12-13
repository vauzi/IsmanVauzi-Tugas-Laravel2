<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if ($request->method() == 'GET') {
            return view('auth/login');
        }
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
        $email = $request->input('email');
        $password = $request->input('password');
        $pengguna = Pengguna::where('email', $email)->first();
        if ($pengguna == null) {
            return redirect()->back()->withErrors([
                'message' => 'Email Tidak di temukan',
            ]);
        }
        if (!Hash::check($password, $pengguna->password)) {
            return redirect()->back()->withErrors([
                'message' => 'Password salah!!.',
            ]);
        }
        if (!session()->isStarted()) session()->start();
        session()->put("logged", true);
        session()->put("idPengguna", $pengguna->id);
        return redirect()->route("product");
    }

    public function logout()
    {
        session()->flush();
        return redirect()->route("login");
    }
}
