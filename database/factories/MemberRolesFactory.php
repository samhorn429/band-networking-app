<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class MemberRolesFactory extends Factory
{
    public function populateRow($row)
    {
        $this->create([
            'id' => $row[0],
            'mem_id' => $row[1],
            'role_id' => $row[2]
        ]);
    }

    public function populateMemberRoles()
    {
        $memFile = fopen('database/factories/tsvFiles/MemberRoles.tsv', "r");

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
            // 'memId' => $this->faker->imei(),
            // 'role' => Str::random(30)
        ];
    }
}
