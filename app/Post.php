<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // Allow these fields to be saved.
    protected $fillable = ['title', 'body'];
    
    // Guard these fields from being saved.
    protected $guarded = [];
}
