<?php

namespace Database\Seeders;

use App\Models\Almond;
use Illuminate\Database\Seeder;

class AlmondsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Almond::factory()->createMany([
            [
                'name' => 'Parasta lieluma',
                'type' => 1
            ],
            [
                'name' => 'Palielinātas',
                'type' => 1
            ],
            [
                'name' => 'Ir',
                'type' => 2
            ],
            [
                'name' => 'Nav',
                'type' => 2
            ],
        ]);
    }
}
