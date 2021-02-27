<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = "products";
    public $primaryKey = 'product_id';
    public $timestamps = true;
    public function subCategory()
    {
        return $this->belongsTo(Sub_Category::class, 'sub_category_id');
    }
}
