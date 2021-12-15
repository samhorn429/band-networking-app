<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ConnectionUserTwoFactory extends Factory
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
            'userId' => $row[1]
        ]);
    }

    public function populateConnections() {
        $connFile = fopen('database/factories/tsvFiles/ConnectionUserTwo.tsv', "r");

        while ($row = fgetcsv($connFile, 1000, "\t")) {
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
            'userId' => $this->faker->userName()
        ];
    }
}
