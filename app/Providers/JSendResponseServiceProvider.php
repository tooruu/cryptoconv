<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Response;
use App\Http\Responses\JSendResponse;

/**
 * @mixin \Illuminate\Http\Response
 */
class JSendResponseServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Response::macro('success', [JSendResponse::class, 'success']);
        Response::macro('fail', [JSendResponse::class, 'fail']);
        Response::macro('error',  [JSendResponse::class, 'error']);
    }
}
