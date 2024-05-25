<?php

namespace Database\Seeders;

use Database\Factories\ClientFactory;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * @var string
     */
    protected const CLIENT_NAME = 'Test';

    /**
     * @var string
     */
    protected const CLIENT_DOCUMENT = '000.000.000-00';

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        ClientFactory::new()->create(
            [
                'name' => self::CLIENT_NAME,
                'document' => self::CLIENT_DOCUMENT,
            ]
        );
    }
}
