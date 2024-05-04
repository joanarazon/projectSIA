<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;


class LoginController extends Controller
{
  public function index()
  {
    return view('login.index');
  }

  public function login(Request $request)
  {
    $request->validate([
      'username' => 'required',
      'password' => 'required',
    ]);

    $username = $request->input('username');
    $password = $request->input('password');

    $user = Account::where('username', $username)->first();


    if ($user && $password === $user->password) {
        return redirect()->route('note.index');
    } else {
      return redirect()->route('login.index')->withErrors(['error' => 'Invalid username or password']);
    }
  }
}

