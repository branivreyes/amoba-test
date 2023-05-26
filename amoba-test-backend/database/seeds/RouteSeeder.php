<?php

use App\Route;

class RouteSeeder extends CustomSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->insertData(Route::class, 'routes.json', 'routes');
    }
}
