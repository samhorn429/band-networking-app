<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class HasBeenAMemberOfFactory extends Factory
{

    public function populateRow($row)
    {
        $this->create([
            'id' => $row[0],
            'musician_id' => $row[1],
            'band_id' => $row[2],
            'memberType' => $row[3],
            'bandType' => $row[4],
            'startMonth' => $row[5],
            'startYear' => $row[6],
            'endMonth' => $row[7],
            'endYear' => $row[8],
            'memberDesc' => $row[9]
        ]);
    }

    public function populateHasBeenAMemberOf() {
        $memFile = fopen('database/factories/tsvFiles/HasBeenAMemberOf.tsv', "r");

        while ($row = fgetcsv($memFile, 1000, "\t")) {
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
            // 'musician_id' => $this->faker->userName(),
            // 'band_id' => $this->faker->userName(),
            // 'noAccMusId' => null,
            // 'noAccBandId' => null,
            // 'startMonth' => $this->faker->month(),
            // 'startYear' => $this->faker->year(),
            // 'endMonth' => null,
            // 'endYear' => null,
            // 'memberDesc' => Str::random(100)
        ];
    }
}
