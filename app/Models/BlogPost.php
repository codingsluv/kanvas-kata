<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    protected $fillable = [
        'user_id', 'title', 'image', 'content',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function likes(){
        return $this->hasMany(LikePost::class);
    }
}