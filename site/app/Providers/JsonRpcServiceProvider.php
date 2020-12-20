<?php

declare(strict_types=1);

namespace App\Providers;

use App\Services\JsonRpcClient;
use Illuminate\Support\ServiceProvider;

/**
 * Class JsonRpcServiceProvider
 *
 * @author Mike Shatunov <mixasic@yandex.ru>
 */
class JsonRpcServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(JsonRpcClient::class, function () {
            return new JsonRpcClient();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
