<?php

namespace app\services;

use app\models\Currency;

class CurrencyService
{
    const URL = "http://www.cbr.ru/scripts/XML_daily.asp";

    public function update()
    {
        $currencies = simplexml_load_file(self::URL);
        foreach ($currencies as $xml) {
            $this->updateByXml($xml);
        }
    }

    private function updateByXml($xml)
    {
        if (!$currency = Currency::findOne(['name' => $xml->Name])) {
            $currency = new Currency();
            $currency->name = $xml->Name;
        }
        $currency->rate = str_replace(',', '.', $xml->Value);
        $currency->save();
    }
}