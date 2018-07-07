<?php

namespace App\Services;

use App\Services\Contracts\CurrencyPresenter as CurrencyPresenterContract;

class CurrencyPresenter implements CurrencyPresenterContract
{
    /**
     * @param Currency $currency
     * @return array
     */
    public static function present(Currency $currency): array
    {
        return [
            'id' => $currency->getId(),
            'name' => $currency->getName(),
            'img' => $currency->getImageUrl(),
            'price' => $currency->getPrice(),
            'daily_change' => $currency->getDailyChangePercent()
        ];
    }
}