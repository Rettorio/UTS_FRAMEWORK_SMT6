<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $data_admin = [
            [
                "name" => "admin1",
                "email" => "admin1@gmail.com",
                "role" => User::$ROLE_ADMIN,
                "password" => Hash::make("adminadmin")
            ],
            [
                "name" => "admin2",
                "email" => "admin2@gmail.com",
                "role" => User::$ROLE_ADMIN,
                "password" => Hash::make("admin2")
            ]
        ];

        foreach ($data_admin as $data) {
            User::create($data);
        }
    }
}
