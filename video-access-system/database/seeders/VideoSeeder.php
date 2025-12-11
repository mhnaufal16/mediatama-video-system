<?php

namespace Database\Seeders;

use App\Models\Video;
use App\Models\Category;
use Illuminate\Database\Seeder;

class VideoSeeder extends Seeder
{
    public function run(): void
    {
        $action = Category::where('name', 'Action')->first();
        $comedy = Category::where('name', 'Comedy')->first();

        Video::create([
            'title' => 'The Matrix',
            'url' => 'https://www.youtube.com/watch?v=vKQi3bBA1y8',
            'description' => 'A computer hacker learns from mysterious rebels about the true nature of his reality and his role in the war against its controllers.',
            'category_id' => $action->id,
        ]);

        Video::create([
            'title' => 'The Hangover',
            'url' => 'https://www.youtube.com/watch?v=tcdUhdOlz9M',
            'description' => 'Three buddies wake up from a bachelor party in Las Vegas, with no memory of the previous night and the bachelor missing.',
            'category_id' => $comedy->id,
        ]);
    }
}
