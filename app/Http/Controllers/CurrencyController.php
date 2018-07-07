<?php

namespace App\Http\Controllers;

use App\Services\Contracts\GetPopularCurrenciesCommandHandler;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    private $getPopularCurrenciesCommandHandler;

    public function __construct(GetPopularCurrenciesCommandHandler $getPopularCurrenciesCommandHandler)
    {
        $this->getPopularCurrenciesCommandHandler = $getPopularCurrenciesCommandHandler;
    }

    public function popular()
    {
        $popularCurrencies = $this->getPopularCurrenciesCommandHandler->handle();
        return view('popular_currencies', ['popularCurrencies' => $popularCurrencies]);
    }
}
