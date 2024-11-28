<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LikePost extends Model
{
    protected $fillable = [
        'user_id', 'blog_post_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function blogPost(){
        return $this->belongsTo(BlogPost::class);
    }
}
