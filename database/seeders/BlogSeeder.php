<?php

namespace Database\Seeders;

use App\Models\Blog;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Blog::query()->create(
            [
                'title_ar' => 'المدونة الاول',
                'title_en' => 'first blog',
                'description_ar' => 'وصف المدونة الاول',
                'description_en' => ',first blog description',
                'image' => 'public/img/blog1.jpg',
                'is_active' => 1,
            ]
        );
    }
}
