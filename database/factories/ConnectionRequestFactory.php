<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ConnectionRequestFactory extends Factory
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
            'sender_id' => $row[1],
            'receiver_id' => $row[2],
            'message' => $row[3],
            'timestamp' => $row[4]
        ]);
    }

    public function populateConnectionRequests() {
        $connFile = fopen('database/factories/tsvFiles/ConnectionRequests.tsv', "r");

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
            // 'senderId' => $this->faker->userName(),
            // 'receiverId' => $this->faker->userName(),
            // 'message' => Str::random(100),
            // 'timestamp' => $this->faker->dateTime()
        ];
    }
}
