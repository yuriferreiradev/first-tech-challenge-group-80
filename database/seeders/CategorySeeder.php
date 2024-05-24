<?php

namespace Database\Seeders;

use Database\Factories\CategoryFactory;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * @var string[]
     */
    protected array $categoryNames = [
        'Drinks',
        'Alcoholic Drinks',
        'Burgers',
        'Pizzas',
        'Breakfast'
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        foreach ($this->categoryNames as $categoryName) {
            CategoryFactory::new()->create(['name' => $categoryName]);
        }
    }
}
