<?php

namespace App\Repos;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    public $table = "product_categories";

    public $fillable = ['name'];

}
