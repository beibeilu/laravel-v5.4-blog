<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Mail\Welcome;
class RegistrationController extends Controller
{
    public function create(){

        return view('registrations.create');

    }

    public function store(){

        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'  //password confirmation
        ]);

        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password'))
        ]);

        // Sign user in
        auth()->login($user);

        // Send welcoming email
        \Mail::to($user)->send(new Welcome($user));

        return redirect('/');

    }


}