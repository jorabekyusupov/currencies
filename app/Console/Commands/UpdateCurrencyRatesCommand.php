<?php

namespace App\Console\Commands;

use App\Models\Currency;
use Illuminate\Console\Command;

class UpdateCurrencyRatesCommand extends Command
{
    protected $signature = 'update-currency-rates';

    protected $description = 'Command description';

    public function handle()
    {
        $xml = simplexml_load_file('http://www.cbr.ru/scripts/XML_daily.asp');

        foreach ($xml->Valute as $valute) {
            $name = (string)$valute->CharCode;
            $rate = (float)$valute->Value / (float)$valute->Nominal;

            Currency::updateOrCreate(['name' => $name], ['rate' => $rate]);
        }

        $this->info('Currency rates updated successfully!');
    }
}
