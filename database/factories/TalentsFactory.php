<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TalentsFactory extends Factory
{
    public function populateRow($row)
    {
        $this->create([
            'id' => $row[0],
            'talent' => $row[1],
            'role' => $row[2],
            'iconURL' => $row[3]
        ]);
    }

    public function populateTalents()
    {
        $talentFile = fopen('database/factories/tsvFiles/Talents.tsv', "r");

        while ($row = fgetcsv($talentFile, 1000, "\t")) {
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
            // 'talent' => Str::random(30),
            // 'role' => Str::random(30),
            // 'iconURL' => $this->faker->imageURL()
        ];
    }
}
