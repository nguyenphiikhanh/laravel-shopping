<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $guarded = [];

    public function images(){
        return $this->hasMany(ProductImage::class,'product_id');
    }
}
