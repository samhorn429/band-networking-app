<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class NoAccountBandGenreFactory extends Factory
{
    public function populateRow($row)
    {
        $this->create([
            'noAccBand_id' => $row[0],
            'genre' => $row[1]
        ]);
    }

    public function populateNoAccountBandGenres()
    {
        $genreFile = fopen('database/factories/tsvFiles/NoAccountBandGenres.tsv', "r");

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
            // 'noAccBandId' => $this->faker->imei(),
            // 'genre' => Str::random(10)
        ];
    }
}
