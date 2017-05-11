<?php

namespace App;


class Comment extends Model
{
    //

    public function post()
    {
        //returns a full class path.
        return $this->belongsTo(Post::class);
    }

    public function user()
    {
        //returns a full class path.
        return $this->belongsTo(User::class);
    }
}
