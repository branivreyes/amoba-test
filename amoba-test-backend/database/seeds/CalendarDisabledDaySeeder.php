<?php

use App\CalendarDisabledDay;
use Illuminate\Database\Seeder;

class CalendarDisabledDaySeeder extends CustomSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->insertData(CalendarDisabledDay::class, 'calendar_days_disabled.json', 'calendar_days_disabled');
    }
}
