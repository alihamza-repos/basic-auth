<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // Specify which attributes are mass assignable
    protected $fillable = ['title', 'content'];

    // Or specify which attributes are not mass assignable
    // protected $guarded = []; // This will allow all attributes to be mass assignable
}
