<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class MessageFactory extends Factory
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
            'conn_id' => $row[1],
            'sender_id' => $row[2],
            'content' => $row[3],
            'timestamp' => $row[4]
        ]);
    }

    public function populateMessages() {
        $msgFile = fopen('database/factories/tsvFiles/Messages.tsv', "r");

        while ($row = fgetcsv($msgFile, 1000, "\t")) {
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
            // 'senderId' => $this->faker->userName(),
            // 'content' => Str::random(100),
            // 'timestamp' => $this->faker->dateTime()
        ];
    }
}
