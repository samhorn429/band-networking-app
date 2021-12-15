<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class LikesGenreFactory extends Factory
{
    public function populateRow($row)
    {
        $this->create([
            'id' => $row[0],
            'user_id' => $row[1],
            'genre' => $row[2],
            'userType' => $row[3]
        ]);
    }

    public function populateLikesGenre()
    {
        $genreFile = fopen('database/factories/tsvFiles/LikesGenre.tsv', "r");

        while ($row = fgetcsv($genreFile, 1000, "\t")) {
            $this->populateRow($row);
        }
    }

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // 'userId' => $this->faker->userName(),
            // 'genre' => Str::random(10),
            // 'userType' => 'MusicianUser'
        ];
    }
}
