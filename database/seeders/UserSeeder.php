<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @author aldiasyah <aldiansyahrpl2@gmail.com>
     */
    public function run(): void
    {
        User::insert([
            "name" => "user",
            "password" => bcrypt("password123"),
            "email" => "user@gmail.com"
        ]);
    }
}
