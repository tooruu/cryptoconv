<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Currency;

class CurrencySeeder extends Seeder
{
    public function run(): void
    {
        Currency::create(['code' => 'LTC', 'name' => 'Litecoin', 'sign' => 'Ł']);
        Currency::create(['code' => 'ETH', 'name' => 'Etherium']);
    }
}
