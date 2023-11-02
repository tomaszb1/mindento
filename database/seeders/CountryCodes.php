<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Src\Common\Infrastructure\Models\CountryCodeEloquentModel;

class CountryCodes extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CountryCodeEloquentModel::create([
            'code' => 'PL',
            'amount' => 1000,
            'currency' => 'PLN',
        ]);

        CountryCodeEloquentModel::create([
            'code' => 'DE',
            'amount' => 5000,
            'currency' => 'PLN',
        ]);

        CountryCodeEloquentModel::create([
            'code' => 'GB',
            'amount' => 7500,
            'currency' => 'PLN',
        ]);
    }
}
