<?php

namespace Database\Seeders;

use App\Models\NasalBreathingThroughtNose;
use Illuminate\Database\Seeder;

class NasalBreathingThroughtNosesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        NasalBreathingThroughtNose::factory()->createMany([
            [
                'name' => 'Brīva'
            ],
            [
                'name' => 'Apgrūtināta'
            ]
        ]);
    }
}
