<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SearchingForFactory extends Factory
{
    public function populateRow($row)
    {
        $this->create([
            'id' => $row[0],
            'user_id' => $row[1],
            'role_id' => $row[2]
        ]);
    }

    public function populateSearchingFor()
    {
        $sfFile = fopen('database/factories/tsvFiles/SearchingFor.tsv', "r");

        while ($row = fgetcsv($sfFile, 1000, "\t")) {
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
            // 'role' => Str::random(30)
        ];
    }
}
