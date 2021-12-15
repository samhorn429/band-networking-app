<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class NoAccountMembersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function populateRow($row)
    {
        $this->create([
            'id' => $row[0],
            'mem_id' => $row[1],
            'name' => $row[2],
            'imagePath' => $row[3]
        ]);
    }

    public function populateNoAccountMembers() {
        $buFile = fopen('database/factories/tsvFiles/NoAccountMembers.tsv', "r");

        while ($row = fgetcsv($buFile, 1000, "\t")) {
            $this->populateRow($row);
        }
    }

    public function definition()
    {
        return [
            // 'memId' => $this->faker->imei(),
            // 'name' => $this->faker->name(),
            // 'imagePath' => $this->faker->imageUrl()
        ];
    }
}
