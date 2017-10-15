<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Model extends Eloquent
{
    // Allow these fields to be saved.
    protected $fillable = ['title', 'body', 'user_id'];
    
    // Guard these fields from being saved.
    protected $guarded = [];
}
