<?php

use App\RouteData;
use Illuminate\Database\Seeder;

class RouteDataSeeder extends CustomSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->insertData(RouteData::class, 'route_data.json', 'routes_data');
    }
}
