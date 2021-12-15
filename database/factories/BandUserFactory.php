<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BandUserFactory extends Factory
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
            'user_id' => $row[1],
            'name' => $row[2],
            'email' => $row[3],
            'city' => $row[4],
            'state' => $row[5],
            'country' => $row[6],
            'description' => $row[7],
            'imagePath' => $row[8],
            'lookingFor' => $row[9],
            'startMonth' => $row[10],
            'startYear' => $row[11],
        ]);
    }

    public function populateBandUsers() {
        $buFile = fopen('database/factories/tsvFiles/BandUsers.tsv', "r");

        while ($row = fgetcsv($buFile, 1000, "\t")) {
            $this->populateRow($row);
        }
    }

    public function definition()
    {
        return [
            // 'userId' => $this->faker->unique()->userName(),
            // 'name' =>$this->faker->name(),
            // 'email' => $this->faker->unique()->safeEmail(),
            // 'city' => $this->faker->city(),
            // 'state' => Str::random(2),
            // 'country' => $this->faker->country(),
            // 'description' => Str::random(100),
            // 'imagePath' => $this->faker->imageUrl(),
            // 'lookingFor' => Str::random(50),
            // 'startMonth' => $this->faker->month(),
            // 'startYear' => $this->faker->year()
        ];
    }
}
