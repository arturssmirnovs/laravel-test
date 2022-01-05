<?php

namespace Database\Seeders;

use App\Models\Separation;
use Illuminate\Database\Seeder;

class SeparationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Separation::factory()->createMany([
            [
                'name' => 'Serozi'
            ],
            [
                'name' => 'Gļotaini'
            ],
            [
                'name' => 'Strutaini'
            ],
            [
                'name' => 'Asiņaini'
            ],
        ]);
    }
}
