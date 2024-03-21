<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AuthRequest;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
  public function index()
{
  if ($user = Auth::user()) {
    switch ($user->level) {
      case '1':
        return redirect()->intended('/');
        break;
      case '2': // Perbaikan: Menggunakan titik dua, bukan titik koma
        return redirect()->intended('pemesanan');
        break;
    }
  }
  return view('auth.login');
}

public function cekLogin(AuthRequest $request)
{
  $credential = $request->only('email', 'password');
  // dd($credential);
  $request->session()->regenerate();
  if (Auth::attempt($credential)) {
    $user = Auth::user();
    switch ($user->level) {
      case '1':
        return redirect()->intended('/');
        break;
      case '2': // Perbaikan: Menggunakan titik dua, bukan titik koma
        return redirect()->intended('pemesanan');
        break;
    }
    return redirect()->intended('/');
  }
  return back()->withErrors([
    'nofound' => 'Email or Password is wrong'
  ])->onlyInput('email');
}

 public function logout(Request $request){
  Auth::login();
  $request->session()->invalidate();
  $request->session()->regenerateToken();

  return redirect('/login');
 }
}
