<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Currency;
use App\Http\Requests\CurrencyConvertRequest;
use App\Services\BinanceTickerService;

class HomeController extends Controller
{
    public function index() {
        $currencies = Currency::all();
        return view('home', ['currencies' => $currencies]);
    }

    public function convert(CurrencyConvertRequest $request) {
        extract($request->validated());
        $request->flash();
        $amount = normalizeNumber($request->query('amount'), '1');
        $btcValue = BinanceTickerService::getBtcValueFor($coin, $amount);

        return view('home', [
            'currencies' => Currency::all(),
            'btcValue' => $btcValue,
        ]);
    }
}
