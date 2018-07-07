<?php

namespace App\Services;


use GuzzleHttp\Client;

class CurrencyGenerator
{
    const CURRENCY_LIST_API_URL = 'https://api.coinmarketcap.com/v2/ticker/';
    const LOGO_PATH_URL = 'https://s2.coinmarketcap.com/static/img/coins/32x32/';

    /**
     * @return array
     */
    public static function generate(): array
    {
        $client = new Client();
        $data = $client->get(self::CURRENCY_LIST_API_URL)->getBody();
        $currenciesData = json_decode($data)->data;
        $currencies = [];

        foreach ($currenciesData as $currency){
            $currencies[] = new Currency(
                $currency->id,
                $currency->name??"",
                $currency->quotes->USD->price??0,
                self::getCurrencyLogoURLByID($currency->id)??"",
                $currency->quotes->USD->percent_change_24h??0
            );
        }
        return $currencies;
    }

    /**
     * @param $id
     * @return string
     */
    private static function getCurrencyLogoURLByID($id): string
    {
        return self::LOGO_PATH_URL.$id.".png";
    }
}