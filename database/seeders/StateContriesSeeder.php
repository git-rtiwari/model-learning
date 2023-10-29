<?php

namespace Database\Seeders;

use App\Models\State;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StateContriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $stateCities = [
            [
                "name" => "Andhra Pradesh",
                "cities" => ["Hyderabad", "Visakhapatnam"]
            ],

            [
                "name" => "Arunachal Pradesh",
                "cities" => ["Itanagar"]
            ],
            [
                "name" => "Assam",
                "cities" => ["Guwahati", "Dispur"]
            ],
            [
                "name" => ": Bihar",
                "cities" => ["Patna"]
            ],
            [
                "name" => ": Chhattisgarh",
                "cities" => ["Raipur"]
            ],
            [
                "name" => ": Goa",
                "cities" => ["Panaji"]
            ],
            [
                "name" => ": Gujarat",
                "cities" => ["Ahmedabad", "Gandhinagar"]
            ],
            [
                "name" => ": Haryana",
                "cities" => ["Chandigarh"]
            ]
        ];

        foreach ($stateCities as $stateCity) {
            $state = State::create([
                'title' => $stateCity['name']
            ]);

            foreach ($stateCity['cities'] as $city){
                $state->cities()->create([
                    'title' => $city
                ]);
            }
        }
    }
}
