<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

use App\Repositories\PostRepository;

class PostController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index(PostRepository $posts){

        // dd($posts->all());
        // $posts = $posts->all();

        $posts = Post::latest()
            ->filter(request(['month', 'year']))
            ->get();

        // filters

        // if ($month = request('month')) {
        //     $posts->whereMonth('created_at', Carbon::parse($month)->month);
        // }
        //
        // if ($year = request('year')) {
        //     $posts->whereYear('created_at', Carbon::parse($year)->year);
        // }
        //
        // $posts = $posts->get();



        // query

        $archives = Post::archives();

        return view('posts.index', compact('posts', 'archives'));
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
