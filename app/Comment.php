<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Moloquent;

class Comment extends Moloquent
{
    protected $connection = 'mongodb';

    protected $fillable = ['body'];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
