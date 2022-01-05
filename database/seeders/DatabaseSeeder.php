<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            AlmondsSeeder::class,
            MucosasSeeder::class,
            NasalBreathingThroughtNosesSeeder::class,
            NasalPassagesSeeder::class,
            NasalSeptumsSeeder::class,
            SeparationsSeeder::class,
            ThroatsSeeder::class,
        ]);
    }
}
