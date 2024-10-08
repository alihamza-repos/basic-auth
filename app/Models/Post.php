<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // Specify which attributes are mass assignable
    protected $fillable = ['title', 'content', 'user_id', 'slug',];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function comments()
    {
    return $this->hasMany(Comment::class);
    }

    // Or specify which attributes are not mass assignable
    // protected $guarded = []; // This will allow all attributes to be mass assignable
}

