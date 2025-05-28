<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Content;
use App\Models\Author;
use App\Models\Category;
use App\Models\Genre;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Content::factory()->count(10)->create()
                ->each(function ($content){
                    $genres  = Genre::inRandomOrder()->take(rand(1, 3))->pluck('id');
                    $content->genres()->attach($genres);

                    $authors = Author::inRandomOrder()->take(rand(1, 2))->pluck('id');
                    $content->authors()->attach($authors);

                    $categoryId = Category::inRandomOrder()->value('id');
                    $content->category_id = $categoryId;
                    $content->save();

                });
    }
}
