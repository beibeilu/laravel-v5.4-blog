<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    // query scope, for a serie of queries
    // Add scope behind the function name!
    public static function scopeIncomplete($query){

      return static::where('completed', 0);

    }
}
