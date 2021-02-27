<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sub_Category extends Model
{
    //
    protected $table = "sub_categories";
    public $primaryKey = 'sub_category_id';
    public $timestamps = true;

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }
    public function products()
    {
        return $this->hasMany(Product::class, 'sub_category_id','sub_category_id');
    }
}
