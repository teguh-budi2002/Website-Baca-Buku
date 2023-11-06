<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoryBookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            "category_name"=> "E-Module",
            "category_slug"=> "e-module",
        ]);

        Category::create([
            "category_name"=> "Panduan dan Praktik Terbaik",
            "category_slug"=> "panduan-dan-praktik-terbaik",
        ]);
    }
}
