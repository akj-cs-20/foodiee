<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Food;

class Category extends Model
{
    //inserting data in db
    protected $fillable = ['name'];

    public function food()
    {
        return $this->hasOne(Food::class,  'category_id','id');
    }
}