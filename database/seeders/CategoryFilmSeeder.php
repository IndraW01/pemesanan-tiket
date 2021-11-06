<?php

namespace Database\Seeders;

use App\Models\CategoryFilm;
use Illuminate\Database\Seeder;

class CategoryFilmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CategoryFilm::factory(20)->create();
    }
}
