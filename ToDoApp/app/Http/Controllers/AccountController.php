<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Account;


class AccountController extends Controller

{
    public function index() {
        return view('register.index');
    }

    public function store(Request $request){
        $data = $request->validate([
            'username'=>'required',
            'password'=>'required'
        ]);
        
        
        $newAccount = Account::create($data);

        return redirect(route('login.index'));
    }
}
