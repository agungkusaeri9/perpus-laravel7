<?php

use App\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Administrator',
            'username' => 'administrator',
            'email' => 'administrator@gmail.com',
            'password' => bcrypt('administrator'),
            'email_verified_at' => now()
        ]);
        $user->assignRole('admin');
        return $user;
    }
}
