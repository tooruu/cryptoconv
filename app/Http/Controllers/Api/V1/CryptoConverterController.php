<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\CurrencyConvertRequest;
use Illuminate\Http\Client\RequestException;
use App\Http\Responses\JSendResponse;
use App\Services\BinanceTickerService;

class CryptoConverterController extends Controller
{
    /**
     * Get BTC value of $coin.
     *
     * @return JSendResponse
     *   JSON response in JSend format:
     *   {
     *      "status": "success",
     *      "data": {
     *          "coin": "LTC",
     *          "amount": "2.34",
     *          "btcValue": "0.00378612"
     *      }
     *   }
     */
    public function getBtcValue(CurrencyConvertRequest $request, string $coin): JSendResponse
    {
        $coin = strtoupper($coin);
        $amount = normalizeNumber($request->query('amount'), '1');
        try {
            $btcValue = BinanceTickerService::getBtcValueFor($coin, $amount);
        } catch (RequestException $e) {
            $resp = $e->response;
            if ($resp->status() === 400) {
                return response()->fail(['coin' => "Invalid pair '{$coin}/BTC'."]);
            }
            return response()->error($resp->getReasonPhrase(), $resp->json(), $resp->status());
        }

        return response()->success([
            'coin' => $coin,
            'amount' => $amount,
            'btcValue' => $btcValue,
        ]);
    }
}
