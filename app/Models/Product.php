<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\cart;


class Product extends Model
{
    public function carts(){
        return $this->hasMany(cart::class);
    }

     public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }
     public function ProductPhoto(){
        return $this->hasMany(ProductPhoto::class);
    }
}
