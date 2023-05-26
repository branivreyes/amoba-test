<?php

use App\UserPlan;
use Illuminate\Database\Seeder;

class UserPlanSeeder extends CustomSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->insertData(UserPlan::class, 'user_plans.json', 'user_plans');
    }
}
