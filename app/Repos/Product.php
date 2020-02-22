<?php

namespace App\Repos;

use Illuminate\Database\Eloquent\Model;

class Product extends  Model
{

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(ProductCategory::class,'cat_id','id');
    }
}
