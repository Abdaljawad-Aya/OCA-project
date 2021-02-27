<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $table = "posts";
    public $primaryKey = 'post_id';
    public $timestamps = true;

    public function comments()
    {
        return $this->hasMany(Comment::class, 'post_id','post_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
