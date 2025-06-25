<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CostumerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data_consumer = [
            [
                "name" => "adudu",
                "email" => "adudu@gmail.com",
                "role" => User::$ROLE_CONSUMER,
                "password" => Hash::make("adudu123")
            ],
            [
                "name" => "gobaba",
                "email" => "gobaba@gmail.com",
                "role" => User::$ROLE_CONSUMER,
                "password" => Hash::make("gobaba123")
            ]
        ];

        foreach ($data_consumer as $data) {
            User::create($data);
        }
    }
}
