<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PenyelenggaraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data_penyelenggara = [
            [
                "name" => "kenny",
                "email" => "kenny@gmail.com",
                "role" => User::$ROLE_PENYELENGGARA,
                "password" => Hash::make("kenny123")
            ],
            [
                "name" => "putri",
                "email" => "putri@gmail.com",
                "role" => User::$ROLE_PENYELENGGARA,
                "password" => Hash::make("putri123")
            ]
        ];

        foreach ($data_penyelenggara as $data) {
            User::create($data);
        }
    }
}
