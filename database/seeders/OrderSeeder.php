<?php

namespace Database\Seeders;

use Database\Factories\OrderFactory;
use Database\Factories\OrderProductFactory;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * @var string
     */
    protected const CLIENT_ID = 1;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $order = OrderFactory::new()->create(
            [
                'client_id' => self::CLIENT_ID,
            ]
        );

        OrderProductFactory::new()->create([
            'order_id' => $order->id,
            'product_id' => 3,
        ]);

        OrderProductFactory::new()->create([
            'order_id' => $order->id,
            'product_id' => 5,
        ]);
    }
}
