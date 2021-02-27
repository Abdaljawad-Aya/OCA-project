<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_name', 'user_email', 'user_password', 'user_image' , 'user_type',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $table = "users";
    public $primaryKey = 'user_id';
    public $timestamps = true;

    public function posts()
    {
        return $this->hasMany(Post::class, 'user_id','user_id');
    }
    public function comment()
    {
        return $this->hasMany(Comment::class,'user_id','user_id');
    }
    public function category()
    {
        return $this->hasMany(Category::class, 'user_id', 'user_id');
    }


}
