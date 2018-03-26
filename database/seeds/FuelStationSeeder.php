<?php

use Illuminate\Database\Seeder;

class FuelStationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\FuelStation::class, 200)->create();
    }
}
