<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::create(['name' => 'Action', 'description' => 'Action movies']);
        Category::create(['name' => 'Comedy', 'description' => 'Comedy movies']);
        Category::create(['name' => 'Drama', 'description' => 'Drama movies']);
    }
}
