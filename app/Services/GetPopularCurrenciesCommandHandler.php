<?php

namespace App\Services;

use App\Services\Contracts\GetPopularCurrenciesCommandHandler as GetPopularCurrenciesCommandHandlerContract;

class GetPopularCurrenciesCommandHandler implements GetPopularCurrenciesCommandHandlerContract
{
    const POPULAR_COUNT = 3;

    private $currencyRepository;

    /**
     * GetPopularCurrenciesCommandHandler constructor.
     * @param CurrencyRepositoryInterface $currencyRepository
     */
    public function __construct(CurrencyRepositoryInterface $currencyRepository)
    {
        $this->currencyRepository = $currencyRepository;
    }

    /**
     * @param int $count
     * @return array
     */
    public function handle(int $count = self::POPULAR_COUNT): array
    {
        $currencies = $this->currencyRepository->findAll();
        usort($currencies, function(Currency $a, Currency $b){
            return $b->getPrice() <=> $a->getPrice();
        });
        return (array_slice($currencies, 0, $count));
    }
}