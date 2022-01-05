<?php

namespace Database\Seeders;

use App\Models\NasalSeptum;
use Illuminate\Database\Seeder;

class NasalSeptumsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        NasalSeptum::factory()->createMany([
            [
                'name' => 'Taisna'
            ],
            [
                'name' => 'Deviēta'
            ],
            [
                'name' => 'pErforēta'
            ],
        ]);
    }
}
