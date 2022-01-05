<?php

namespace Database\Seeders;

use App\Models\Mucosa;
use Illuminate\Database\Seeder;

class MucosasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Mucosa::factory()->createMany([
            [
                'name' => 'Sārta',
                'type' => 1
            ],
            [
                'name' => 'Hiperemēta',
                'type' => 1
            ],
            [
                'name' => 'Cianotiska',
                'type' => 1
            ],
            [
                'name' => 'Bāla',
                'type' => 1
            ],
            [
                'name' => 'Tūskaina',
                'type' => 2
            ],
            [
                'name' => 'Atrofiska',
                'type' => 2
            ],
            [
                'name' => 'Hipertrofiska',
                'type' => 2
            ],
        ]);
    }
}
