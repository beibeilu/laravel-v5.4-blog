<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function posts()
    {
        //returns a full class path.
        return $this->hasMany(Post::class);
    }

    public function comments()
    {
        //returns a full class path.
        return $this->hasMany(Comment::class);
    }

    public function publish(Post $post){
        $this->posts()->save($post);

    }
    public function commentOn(Post $post, $body){

        $this->comments()->create([
            'post_id' => $post->id,
            'body' => request('body')
        ]);

    }

}
