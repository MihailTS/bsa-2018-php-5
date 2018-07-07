<?php

namespace App\Http\Controllers\Api\Currency;

use App\Http\Controllers\Controller;
use App\Services\Contracts\GetCurrenciesCommandHandler;
use App\Services\Contracts\GetMostChangedCurrencyCommandHandler;
use App\Services\Contracts\CurrencyPresenter;


class CurrencyController extends Controller
{
    private $currencyPresenter;
    private $getCurrenciesCommandHandler;
    private $getMostChangedCurrencyCommandHandler;

    public function __construct(
        CurrencyPresenter $currencyPresenter,
        GetCurrenciesCommandHandler $getCurrenciesCommandHandler,
        GetMostChangedCurrencyCommandHandler $getMostChangedCurrencyCommandHandler
    )
    {
        $this->currencyPresenter = $currencyPresenter;
        $this->getCurrenciesCommandHandler = $getCurrenciesCommandHandler;
        $this->getMostChangedCurrencyCommandHandler = $getMostChangedCurrencyCommandHandler;
    }

    public function index()
    {
        $currencies = $this->getCurrenciesCommandHandler->handle();
        $result = [];

        foreach ($currencies as $currency) {
            $result[] = $this->currencyPresenter::present($currency);
        }
        return response()->json($result);
    }

    public function unstable()
    {
        $mostChangedCurrency = $this->getMostChangedCurrencyCommandHandler->handle();
        $result = $this->currencyPresenter::present($mostChangedCurrency);
        return response()->json($result);
    }
}
