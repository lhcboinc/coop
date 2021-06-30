<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'                 => 1,
                'name'               => 'Admin',
                'email'              => 'admin@admin.com',
                'password'           => bcrypt('password'),
                'remember_token'     => null,
                'verified'           => 1,
                'verified_at'        => '2021-06-12 07:57:31',
                'verification_token' => '',
                'first_name'         => '',
                'last_name'          => '',
                'signal'             => '',
                'skype'              => '',
                'telegram'           => '',
                'viber'              => '',
                'whatsapp'           => '',
                'photo'              => '',
                'gps_lat'            => '',
                'gps_long'           => '',
                'country'            => '',
                'county'             => '',
                'city'               => '',
                'address'            => '',
                'zip'                => '',
                'note'               => '',
                'text'               => '',
            ],
        ];

        User::insert($users);
    }
}
