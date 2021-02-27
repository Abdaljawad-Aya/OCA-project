<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $table = "categories";
    public $primaryKey = 'category_id';
    public $timestamps = true;
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function subCategories()
    {
        return $this->hasMany(Sub_Category::class,'category_id','category_id');
    }
}
