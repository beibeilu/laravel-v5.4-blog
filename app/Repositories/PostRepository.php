<?php

namespace App\Repositories;
use App\Post;

class PostRepository
{

    public function all()
    {
        return Post::all();
    }

    public function find()
    {

    }
}
