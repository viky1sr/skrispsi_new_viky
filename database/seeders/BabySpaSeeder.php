<?php

namespace Database\Seeders;

use App\HomeCare\MasterSpa\MasterSpa;
use Illuminate\Database\Seeder;

class BabySpaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list_name = [
            'Pregnancy massage',
            'Foot SPA with Aromatherapy',
            'Face Acupressure (totok wajah)',
            'Breast Care (pijat laktasi)',
            'Pijat Oksitosin',
            'Baby massage',
            'Hair Cut & Potong Kuku',
            'Baby GYM',
            'Face Acupressure for Baby',
            'Baby Swim',
            'Baby SPA: massage & gym & swim',
            'Lulur Bayi',
            'Pediatric massage for Baby',
            'Kids massage',
            'Pediatric massage for Kids',
            'Face Acupressure for Kids',
            'Kids SPA',
            'Lulur Anak',
            'Postnatal care massage',
            'Herbal bath'
        ];

        $prices = [
            150000,
            50000,
            70000,
            70000,
            70000,
            80000,
            70000,
            40000,
            35000,
            50000,
            150000,
            30000,
            120000,
            90000,
            135000,
            35000,
            170000,
            50000,
            150000,
            75000,
        ];

        foreach($list_name as $key => $nm) {
            MasterSpa::firstOrCreate([
                'name' => $nm,
                'price' => $prices[$key]
            ]);
        }
    }
}
