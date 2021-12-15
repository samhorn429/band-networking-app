<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class HasTalentFactory extends Factory
{

    public function populateRow($row)
    {
        $this->create([
            'user_id' => $row[0],
            'talent_id' => $row[1]
        ]);
    }

    public function populateHasTalent()
    {
        $htFile = fopen('database/factories/tsvFiles/HasTalent.tsv', "r");

        while ($row = fgetcsv($htFile, 1000, "\t")) {
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
            // 'talent' => Str::random(10)
        ];
    }
}
