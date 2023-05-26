<?php

use App\Reservation;
use Illuminate\Database\Seeder;

class ReservationSeeder extends CustomSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->insertData(Reservation::class, 'reservations.json', 'reservations');
    }
}
