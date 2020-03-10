<?php

namespace App\Events\Product;

use App\Repos\Product;
use App\Repos\User;

class Created
{
    public $product;
    public $additionalAttr;

    public function __construct(Product $product,array $additionalAttr)
    {
        $this->product = $product;
        $this->additionalAttr = $additionalAttr;
    }
}
