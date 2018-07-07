<?php

namespace App\Providers;

use App\Services\CurrencyGenerator;
use Illuminate\Support\ServiceProvider;

use App\Services\CurrencyRepository;
use App\Services\CurrencyRepositoryInterface;

use App\Services\Contracts\GetCurrenciesCommandHandler as GetCurrenciesCommandHandlerContract;
use App\Services\GetCurrenciesCommandHandler;

use App\Services\Contracts\GetMostChangedCurrencyCommandHandler as GetMostChangedCurrencyCommandHandlerContract;
use App\Services\GetMostChangedCurrencyCommandHandler;

use App\Services\Contracts\GetPopularCurrenciesCommandHandler as GetPopularCurrenciesCommandHandlerContract;
use App\Services\GetPopularCurrenciesCommandHandler;

use App\Services\Contracts\CurrencyPresenter as CurrencyPresenterContract;
use App\Services\CurrencyPresenter;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CurrencyRepositoryInterface::class, function () {
            return new CurrencyRepository(CurrencyGenerator::generate());
        });
        $this->app->bind(GetCurrenciesCommandHandlerContract::class,
            GetCurrenciesCommandHandler::class
        );
        $this->app->bind(GetPopularCurrenciesCommandHandlerContract::class,
            GetPopularCurrenciesCommandHandler::class
        );
        $this->app->bind(GetMostChangedCurrencyCommandHandlerContract::class,
            GetMostChangedCurrencyCommandHandler::class
        );
        $this->app->bind(CurrencyPresenterContract::class,
            CurrencyPresenter::class
        );
    }
}
