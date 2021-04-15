<?php

namespace App\Providers;

use App\Clients\JsonPlaceholder\JsonPlaceholder;
use App\Services\PostService;
use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

        $this->app->bind(JsonPlaceholder::class, function () {
            return new JsonPlaceholder();
        });

        $this->app->bind(PostService::class, function () {
            return new PostService(app()->make(JsonPlaceholder::class));
        });

    }
}
