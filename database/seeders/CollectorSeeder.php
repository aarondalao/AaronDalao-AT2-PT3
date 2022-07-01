<?php

namespace Database\Seeders;

use App\Models\Collector;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CollectorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $collectors = [
            [
                "given_name" => "Evan",
                "family_name" => "Keel",
                "cars" => [],
            ],
            [
                "given_name" => "Jo",
                "family_name" => "Kerr",
                "cars" => [
                    "BMW-M",
                    "KTM-XBOWR",
                    "AUDI-EGT",
                    "MINI-CLUB",
                    "MINI-CONV",
                    "MG-HS",
                    "BMW-1",
                    "AUDI-A8",
                ],
            ],
            [
                "given_name" => "Izzy",
                "family_name" => "Kidding",
                "cars" => [
                    "MOGAN-44",
                    "ARIEL-ATOM4",
                    "AUDI-S8",
                ],
            ],
            [
                "given_name" => "Fay",
                "family_name" => "King",
                "cars" => [
                    "ARIEL-ATOM4",
                    "MINI-CONV",
                    "BMW-I",
                    "VW-ARTEON",
                    "VW-ARTEON",
                    "ARIEL-ATOM4",
                    "TESLA-MODX",
                ],
            ],
            [
                "given_name" => "Joe",
                "family_name" => "King",
                "cars" => [
                    "ARIEL-ATOM4",
                    "ARIEL-ATOM4",
                    "BMW-1",
                    "VW-POLO",
                    "MINI-CLUB",
                    "MOGAN-44",
                    "MG-MGZS",
                ],
            ],
            [
                "given_name" => "Raney",
                "family_name" => "Schauer",
                "cars" => [
                    "VW-AMAROK",
                    "MG-HS",
                    "BMW-M2",
                ],
            ],
            [
                "given_name" => "June",
                "family_name" => "Schauer",
                "cars" => [
                    "MORGAN-ROADSTER",
                    "MINI-3DH",
                    "TESLA-MODY",
                    "TESLA-MODY",
                    "MINI-3DH",
                ],
            ],
            [
                "given_name" => "April",
                "family_name" => "Schauer",
                "cars" => [
                    "MG-MGZS",
                ],
            ],
            [
                "given_name" => "Al K.",
                "family_name" => "Seltzer",
                "cars" => [
                    "ARIEL-ATOM4",
                    "AUDI-A8",
                    "AUDI-A1",
                    "VW-ARTEON",
                    "MORGAN-AEROC",
                    "VW-TROC",
                ],
            ],
            [
                "given_name" => "Dee",
                "family_name" => "Sember",
                "cars" => [
                    "ARIEL-ATOM4",
                    "BMW-1",
                    "VW-TROC",
                    "MOGAN-44",
                    "MG-MGZS",
                    "TESLA-TRUCK",
                    "ARIEL-ATOM4",
                ],
            ],
            [
                "given_name" => "Justin",
                "family_name" => "Tune",
                "cars" => [
                    "AUDI-A1",
                    "ARIEL-ATOM4",
                    "BMW-8",
                    "BMW-8",
                    "BMW-I",
                    "AUDI-S8",
                    "MORGAN-ROADSTER",
                    "AUDI-A8",
                ],
            ],
            [
                "given_name" => "Carrie A.",
                "family_name" => "Tune",
                "cars" => [
                    "AUDI-EGT",
                ],
            ],
            [
                "given_name" => "Quinn",
                "family_name" => "Tuplets",
                "cars" => [
                    "AUDI-S8",
                    "BMW-8",
                    "KTM-XBOWR",
                    "VW-TROC",
                    "BMW-M2",
                ],
            ],
            [
                "given_name" => "Colin",
                "family_name" => "Allcars",
                "cars" => [
                    "VW-AMAROK",
                    "MINI-3DH",
                ],
            ],
            [
                "given_name" => "Cary",
                "family_name" => "Baggs",
                "cars" => [
                    "MINI-CONV",
                ],
            ],
            [
                "given_name" => "Winnie",
                "family_name" => "Bago",
                "cars" => [
                ],
            ],
            [
                "given_name" => "Frank N.",
                "family_name" => "Beans",
                "cars" => [
                    "MINI-CONV",
                    "BMW-8",
                    "AUDI-EGT",
                ],
            ],
            [
                "given_name" => "Harry",
                "family_name" => "Beard",
                "cars" => [
                    "KTM-XBOWR",
                    "TESLA-MODX",
                    "TESLA-MODY",
                    "BMW-M6",
                    "KTM-XBOWR",
                ],
            ],
            [
                "given_name" => "Al B.",
                "family_name" => "Zienya",
                "cars" => [],
            ],
            [
                "given_name" => "Cy",
                "family_name" => "Yonarra",
                "cars" => [
                    "TESLA-MODX",
                    "MG-MG3",
                ],
            ],
            [
                "given_name" => "Pearl E.",
                "family_name" => "White",
                "cars" => [],
            ],
            [
                "given_name" => "Sno",
                "family_name" => "White",
                "cars" => [
                    "TESLA-MODX",
                    "BMW-2",
                    "ARIEL-ATOM4",
                ],
            ],
            [
                "given_name" => "Chuck",
                "family_name" => "Wagon",
                "cars" => [
                    "KTM-XBOWR",
                ],
            ],
            [
                "given_name" => "Patty",
                "family_name" => "Wagon",
                "cars" => [
                    "MINI-CONV",
                    "MINI-CLUB",
                    "BMW-1",
                ],
            ],
            [
                "given_name" => "Cara",
                "family_name" => "Van",
                "cars" => [],
            ],
        ];

        shuffle($collectors);

        foreach ($collectors as $collector) {
            Collector::create($collector);
        }
    }
}
