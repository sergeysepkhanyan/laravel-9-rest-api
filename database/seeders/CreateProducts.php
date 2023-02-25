<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductProperty;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class CreateProducts extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            'Book',
            'Ball',
            'Pen',
            'Table',
            'Phone',
            'Ring',
            'Laptop',
            'Backpack',
            'Shirt'
        ];

        $properties = [
            'color' => ['red', 'white', 'yellow', 'black', 'green'],
            'weight' => ['1000', '1200', '1500', '2000', '500'],
            'height' => ['10', '12', '15', '20', '50'],
            'width'=> ['10', '12', '15', '20', '50']
        ];

        for ($i = 0; $i <= 200; $i++){
            foreach ($products as $product) {
                $product = Product::create([
                    'title' => $product,
                    'price' => rand(10, 9999),
                    'count' => rand(1, 10)
                ]);

                foreach ($properties as $key => $value){
                    ProductProperty::create([
                        'product_id' => $product->id,
                        'property' => $key,
                        'value' => Arr::random($value)
                    ]);
                }
            }
        }
    }
}
