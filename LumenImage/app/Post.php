<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];

    public function getImageAttribute($value){
        return url("/storage/app/images/".$value);
    }
}
