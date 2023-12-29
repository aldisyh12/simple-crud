<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @author aldiasyah <aldiansyahrpl2@gmail.com>
     */
    public function run(): void
    {
        Category::insert([
            "name" => "Kategori Test",
            "created_by" => 1
        ]);
    }
}
