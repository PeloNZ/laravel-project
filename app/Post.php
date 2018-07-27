<?php

namespace App;
use Jenssegers\Mongodb\Eloquent\Model as Moloquent;

class Post extends Moloquent
{
    // Allow these fields to be saved.
    protected $fillable = ['title', 'body', 'user_id'];

    // Guard these fields from being saved.
    protected $guarded = [];

    protected $collection = 'posts';

    protected $connection = 'mongodb';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
