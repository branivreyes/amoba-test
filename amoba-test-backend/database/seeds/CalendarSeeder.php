<?php

use App\Calendar;
use Illuminate\Database\Seeder;

class CalendarSeeder extends CustomSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->insertData(Calendar::class, 'calendar.json', 'calendar');
    }
}
