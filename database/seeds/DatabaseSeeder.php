<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UsersTableSeeders::class);
         $this->call(RadarsTableSeeder::class);
         $this->call(DriversTableSeeder::class);
         $this->call(FuelStationSeeder::class);
    }
}
