<?php

namespace App\Services;

use App\Services\Contracts\GetMostChangedCurrencyCommandHandler as GetMostChangedCurrencyCommandHandlerContract;

class GetMostChangedCurrencyCommandHandler implements GetMostChangedCurrencyCommandHandlerContract
{
    private $currencyRepository;

    /**
     * GetMostChangedCurrencyCommandHandler constructor.
     * @param CurrencyRepositoryInterface $currencyRepository
     */
    public function __construct(CurrencyRepositoryInterface $currencyRepository)
    {
        $this->currencyRepository = $currencyRepository;
    }

    /**
     * @return Currency
     */
    public function handle(): Currency
    {
        $currencies = $this->currencyRepository->findAll();
        usort($currencies, function(Currency $a, Currency $b){
            return abs($b->getDailyChangePercent()) <=> abs($a->getDailyChangePercent());
        });
        return array_shift($currencies);
    }
}