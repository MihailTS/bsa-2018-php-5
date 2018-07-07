<?php

namespace App\Services;

use App\Services\Contracts\GetCurrenciesCommandHandler as GetCurrenciesCommandHandlerContract;

class GetCurrenciesCommandHandler implements GetCurrenciesCommandHandlerContract
{
    private $currencyRepository;

    /**
     * GetCurrenciesCommandHandler constructor.
     * @param CurrencyRepositoryInterface $currencyRepository
     */
    public function __construct(CurrencyRepositoryInterface $currencyRepository)
    {
        $this->currencyRepository = $currencyRepository;
    }

    /**
     * @return array
     */
    public function handle(): array
    {
        return $this->currencyRepository->findAll();
    }
}