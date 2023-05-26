<?php

use App\User;

class UserSeeder extends CustomSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->insertData(User::class, 'users.json', 'users');
    }
}
