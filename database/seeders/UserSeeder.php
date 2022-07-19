<?php

namespace Database\Seeders;

use App\HomeCare\User\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void

     */
    public function run()
    {
        $admin = User::firstOrCreate([
            'full_name' => 'Elvira Karina',
            'email' => 'vieramomandbabyspa@gmail.com',
            'number_phone' => (int) '081319599677',
            'password' => \Hash::make('qweasd123'),
            'email_verified_at' => Carbon::now()
        ]);
        $admin->assignRole('admin');

        $admin1 = User::firstOrCreate([
            'full_name' => 'Admin',
            'email' => 'admin@demo.com',
            'number_phone' => (int) '12345678',
            'password' => \Hash::make('qweasd123'),
            'email_verified_at' => Carbon::now()
        ]);
        $admin1->assignRole('admin');


        $member = User::firstOrCreate([
            'full_name' => 'Member',
            'email' => 'member@demo.com',
            'number_phone' => (int) '12345678',
            'password' => \Hash::make('qweasd123'),
            'email_verified_at' => Carbon::now()
        ]);
        $member->assignRole('member');
    }
}
