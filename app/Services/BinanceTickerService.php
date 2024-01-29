<?php

namespace App\Services;
use Illuminate\Support\Facades\Http;

class BinanceTickerService
{
    private const API_ENDPOINT = 'https://api.binance.com/api/v3/ticker';

    public static function getBtcValueFor(string $coin, string $amount = '1'): string
    {
        $rate = self::getBtcRateFor($coin);
        $valueInBtc = bcmul($amount, $rate);
        return normalizeNumber($valueInBtc);
    }

    public static function getBtcRateFor(string $coin): string
    {
        return self::getSymbolRate($coin.'BTC');
    }

    private static function getSymbolRate(string $symbol): string
    {
        $response = Http::get(self::API_ENDPOINT.'/price', ['symbol' => $symbol])->throw();
        return $response->json()['price'];
    }
}
