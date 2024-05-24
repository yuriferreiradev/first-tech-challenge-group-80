<?php

namespace Database\Seeders;

use Database\Factories\ProductFactory;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * @var array|array[]
     */
    protected array $products = [
        [
            'name' => 'Soda',
            'price' => 8.50,
            'category_id' => 1,
        ],
        [
            'name' => 'Coffe',
            'price' => 5.0,
            'category_id' => 1,
        ],
        [
            'name' => 'Beer',
            'price' => 14.90,
            'category_id' => 2,
        ],
        [
            'name' => 'Vodka',
            'price' => 12.90,
            'category_id' => 2,
        ],
        [
            'name' => 'Cheeseburger',
            'price' => 29.90,
            'category_id' => 3,
        ],
        [
            'name' => 'Veggie Burger',
            'price' => 25.90,
            'category_id' => 3,
        ],
        [
            'name' => 'Pepperoni Pizza',
            'price' => 39.90,
            'category_id' => 4,
        ],
        [
            'name' => 'Margherita Pizza',
            'price' => 39.90,
            'category_id' => 4,
        ],
        [
            'name' => 'Pancakes',
            'price' => 6.90,
            'category_id' => 5,
        ],
        [
            'name' => 'Omelette',
            'price' => 5.0,
            'category_id' => 5,
        ],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        foreach ($this->products as $product) {
            ProductFactory::new()->create([
                'name' => $product['name'],
                'price' => $product['price'],
                'category_id' => $product['category_id']
            ]);
        }
    }
}
