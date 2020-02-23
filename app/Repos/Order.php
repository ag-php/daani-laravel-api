<?php

namespace App\Repos;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'product_id',
        'user_id',
        'completed',
        'notes'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function ScopeByUserAndProductId($q,$userId,$productId)
    {
        return $q->where(['user_id' => $userId,'product_id' => $productId]);
    }

}
