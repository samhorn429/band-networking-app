<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ConnectionFactory extends Factory
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
            'user1_id' => $row[1],
            'user2_id' => $row[2],
            'timestamp' => $row[3]
        ]);
    }

    public function populateConnections() {
        $connFile = fopen('database/factories/tsvFiles/Connections.tsv', "r");

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
            // 'connId' => $this->faker->imei(),
            // 'userIdOne' => $this->faker->userName(),
            // 'userIdTwo' => $this->faker->userName(),
            // 'timestamp' => $this->faker->dateTime()
        ];
    }
}
