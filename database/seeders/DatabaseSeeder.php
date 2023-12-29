<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     * @author aldiasyah <aldiansyahrpl2@gmail.com>
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            CategorySeeder::class
        ]);
    }
}
