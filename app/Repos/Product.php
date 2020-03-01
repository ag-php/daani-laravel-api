<?php

namespace App\Repos;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'is_available',
        'user_id',
        'cat_id',
        'used_for',
        'description',
        'home_delivery',
        'address'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'cat_id', 'id');
    }

    public function getUserId() : int
    {
        return $this->user_id;
    }
}
