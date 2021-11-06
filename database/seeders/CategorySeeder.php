<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'nama_category' => 'Action',
            'slug_category' => 'action'
        ]);
        Category::create([
            'nama_category' => 'Horror',
            'slug_category' => 'horror'
        ]);
        Category::create([
            'nama_category' => 'Animation',
            'slug_category' => 'animation'
        ]);
        Category::create([
            'nama_category' => 'Drama',
            'slug_category' => 'drama'
        ]);
        Category::create([
            'nama_category' => 'Adventure',
            'slug_category' => 'adventure'
        ]);
    }
}
