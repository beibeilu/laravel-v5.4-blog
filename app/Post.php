<?php

namespace App;

// use Illuminate\Database\Eloquent\Model as Model;
use Carbon\Carbon;

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

    public function tags()
    {
        // Many to many.
        return $this->belongsToMany(Tag::class);
    }

    public function scopeFilter($query, $filters)
    {
        if ($month = $filters['month']) {
            $query->whereMonth('created_at', Carbon::parse($month)->month);
        }

        if ($year = $filters['year']) {
            $query->whereYear('created_at', Carbon::parse($year)->year);
        }
    }

    public static function archives(){
        return static::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
            -> groupBy('year', 'month')
            -> orderByRaw('min(created_at) desc')
            -> get() -> toArray();
    }

}
