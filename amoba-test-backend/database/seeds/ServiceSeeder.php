<?php

use App\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends CustomSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->insertData(Service::class, 'services.json', 'services');
    }
}
