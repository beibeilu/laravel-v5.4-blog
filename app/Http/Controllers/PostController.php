<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;


class PostController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index(){

        $posts = Post::latest()->get();

        return view('posts.index', compact('posts'));
    }

    public function show(Post $post){

        return view('posts.show', compact('post'));

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

        // Post::create([
        //     'title' => request('title'),
        //     'body' => request('body'),
        //     'user_id' => auth()->id()
        // ]);

        // or

        auth()->user()->publish(
            new Post(request(['title', 'body']))
        );

        return redirect('/');
    }



}
