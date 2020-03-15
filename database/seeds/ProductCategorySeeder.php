<?php

use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'Clothes' => [
                'Bags',
                'Mens Clothing',
                'Mens Shoes',
                'Womens Clothing',
                'Womens Shoes',
                'Watches',
                'Sunglasses',
                'Others'
            ],
            'Electronics',
            'Furniture',
            'Toys',
            'Books',
            'Stationery',
            'Others',
            'Foods' => [
                'Vegetables',
                'Fruits',
                'Others'
            ]
        ];

        foreach($categories as $key => $value) {

            if(is_int($key)) {
                \App\Repos\ProductCategory::create(['name' => $value]);
                continue;
            }

            $parenCategory = \App\Repos\ProductCategory::create(['name' => $key]);


            foreach($value as $childCategory) {
                 \App\Repos\ProductCategory::create(['name' => $childCategory,'parent_id' => $parenCategory->id]);
            }

        }
    }
}
