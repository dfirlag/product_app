<?php

namespace App\Providers;

use App\Product\Application\Command\CreateProductCommand;
use App\Product\Application\CommandHandler\CreateProductCommandHandler;
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
        $bus = $this->app->make('Joselfonseca\LaravelTactician\CommandBusInterface');
        $this->app->instance('Joselfonseca\LaravelTactician\CommandBusInterface', $bus);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $bus = $this->app->make('Joselfonseca\LaravelTactician\CommandBusInterface');
        $bus->addHandler(
            CreateProductCommand::class,
            CreateProductCommandHandler::class
        );
    }
}
