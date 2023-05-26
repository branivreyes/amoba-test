<?php

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
             UserSeeder::class,
             RouteSeeder::class,
             CalendarSeeder::class,
             RouteDataSeeder::class,
             UserPlanSeeder::class,
             ReservationSeeder::class,
             CalendarDisabledDaySeeder::class,
             ServiceSeeder::class,
         ]);
    }
}
