<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
  public function index()
  {

    return view('login', [
      "active" => "login"
    ]);
  }

  public function login(Request $request)
  {
    $dataTervalidasi = $request->validate([
      'email' => 'required|email',
      'password' => 'required'
    ]);

    if (Auth::attempt($dataTervalidasi)) {
      //regenerate user session untuk menghindari session fixation
      $request->session()->regenerate();
      //redirect ke dashboard
      return redirect()->intended('/dashboard');
    }

    return back()->with("LoginError", "Login Failed !");
  }

  public function logout(Request $request)
  {
    Auth::logout();

    //invalidate session agar tidak ada session fixation
    $request->session()->invalidate();
    //regenerate token csrf agar tidak sembarangan orang logout dan pakai token yg sama
    $request->session()->regenerateToken();

    return redirect('/');
  }
}
