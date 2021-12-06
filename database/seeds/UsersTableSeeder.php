<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $madmin = User::create([
            'name' => 'Master Admin',
            'email' => 'madmin@gmail.com',
            'password' => bcrypt('madmin')
        ]);

        $madmin->assignRole('master admin');

        $admin = User::create([
            'name' => 'Sdmin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin')
        ]);

        $admin->assignRole('admin');

        $member = User::create([
            'name' => 'Member',
            'email' => 'member@gmail.com',
            'password' => bcrypt('member')
        ]);

        $member->assignRole('member');
    }
}
