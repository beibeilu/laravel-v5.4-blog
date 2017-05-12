<?php

namespace App;

// use Illuminate\Database\Eloquent\Model as Model;

class Post extends Model
{

    // Moved this to parent - Model class.
    // Check inputs to avoid malicious inputs, solve mass assignment exception.
    // protected $fillable = ['title', 'body'];
    // $guarded - blacklist.

    public function comments()
    {
        //returns a full class path.
        return $this->hasMany(Comment::class);
    }

    public function user()
    {
        //returns a full class path.
        return $this->belongsTo(User::class);
    }

}
