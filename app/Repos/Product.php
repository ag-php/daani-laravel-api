<?php

namespace App\Repos;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'purchase_date',
        'district',
        'full_address',
        'is_available',
        'user_id',
        'cat_id',
        'description',
        'usable_date'
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
