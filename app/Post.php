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

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function addComment($body)
    {
        $this->comments()->create(['body' => $body]);
    }

}
