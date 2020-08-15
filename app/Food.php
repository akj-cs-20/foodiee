<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;

class Food extends Model
{
    //insert database
    protected $fillable = ['name','description','price','category_id','image'];

    // foreign relationships
    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
}