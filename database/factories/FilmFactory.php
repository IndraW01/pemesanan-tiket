<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

class FilmFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $nilai = ['Now Playing', 'Upcoming'];
        return [
            'title' => $this->faker->sentence(),
            'sinopsis' => collect($this->faker->paragraphs(mt_rand(2, 5)))->map(fn($p) => "<p>$p</p>")->implode(''),
            'sutradara' => $this->faker->userName(),
            'pemain' => $this->faker->userName(),
            'produksi' => $this->faker->sentence(),
            'playing' => fn() =>
                        $nilai[array_rand($nilai, 1)],
            'harga' => 45000,
            'durasi' => 90
        ];
    }
}
