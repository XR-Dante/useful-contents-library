<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Author;
use App\Models\Category;

class AuthorSeeder extends Seeder
{

    public function run(): void
    {
        Category::factory()->count(10)->create();
    }
}
