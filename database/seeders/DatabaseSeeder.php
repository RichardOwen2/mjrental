<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Type;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            "name" => "Super Admin",
            "email" => "superadmin@gmail.com",
            "password" => bcrypt("12345678"),
        ]);

        collect([
            "ADV PUTIH",
            "ADV HITAM",
            "N-MAX HITAM",
            "N-MAX PUTIH",
            "N-MAX MERAH",
            "N-MAX HIJAU",
        ])->each(function ($type) {
            Type::create([
                "name" => $type,
            ]);
        });
    }
}
