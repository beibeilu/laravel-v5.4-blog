<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

class PostController extends Controller
{
    //

    public function index(){

    }

    public function show(){

        return view('posts.show');

    }

    public function create(){

        return view('posts.create');

    }

    public function store(){

        // if this is getting lengthy, use dedicated form request classes.
        // those are automatically generated in App\HTTP\Request directory
        $this->validate(request(), [
            'title' => 'required',
            'body' => 'required'
        ]);

        Post::create(request(['title', 'body']));

        return redirect('/');
    }



}
