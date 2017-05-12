<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    //

    public function __construct(){

        $this->middleware('guest', ['except'=>'destroy']);
    }

    public function create(){
        return view('sessions.create');
    }

    public function store(){

        if ( ! auth()->attempt(request(['email', 'password'])) ){
            return back()->withErrors([
                'message' => 'Please check your email and password.'
            ]);
        }

        return redirect('/');
    }

    public function destroy(){

        auth()->logout();

        return redirect('/');
    }
}
