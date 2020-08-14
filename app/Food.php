<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    //insert database
    protected $fillable = ['name','description','price','category_id'];
}
