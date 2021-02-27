<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    //
    protected $table = "admins";
    public $primaryKey = 'user_id';
    public $timestamps = true;
}
