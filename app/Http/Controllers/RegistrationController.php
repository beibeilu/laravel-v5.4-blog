<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationRequest;
class RegistrationController extends Controller
{
    public function create(){

        return view('registrations.create');

    }

    public function store(RegistrationRequest $request){

        // validate through FormRequest

        $request->persist();

        session()->flash('message', 'Thanks so much for signing up!');

        return redirect('/');

    }


}
