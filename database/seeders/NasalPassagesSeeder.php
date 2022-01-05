<?php

namespace Database\Seeders;

use App\Models\NasalPassage;
use Illuminate\Database\Seeder;

class NasalPassagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        NasalPassage::factory()->createMany([
            [
                'name' => 'Brīvas'
            ],
            [
                'name' => 'Sašaurinātas'
            ],
            [
                'name' => 'Saaugumi'
            ],
            [
                'name' => 'Veidojumi'
            ],
        ]);
    }
}
