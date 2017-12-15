<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class RegisterAdminController extends Controller
{
    //
    public function add() {
      return view("registerAdmin");
    }

    public function store(Request $request) {
      $this->validate($request, [
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'nickname' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'age' => 'required|int|min:18|max:128',
        'country' => 'required|string|min:2|max:3',
        'password' => 'required|string|min:6|confirmed',
        'tyc' => 'accepted',
      ]);

      User::create([
        'first_name' => $request['first_name'],
        'last_name' => $request['last_name'],
        'nickname' => $request['nickname'],
        'email' => $request['email'],
        'age' => $request['age'],
        'country' => $request['country'],
        'password' => bcrypt($request['password']),
        'type' => "1",
      ]);

      return redirect("/productos");
    }
}
