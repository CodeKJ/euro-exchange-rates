<?php

namespace App\Console\Commands;

use App\Currency;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class FetchExchangeRates extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:exchange-rates';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch euro exchange rates from Central Bank of Latvia';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Fetch data from RSS feed xml hosted by Central Bank of Latvia
     * Usages:
     * 1) http://localhost/api/fetch
     * 2) php artisan fetch:exchange-rates
     * 3) CRON
     */
    public function handle()
    {
        $xml = simplexml_load_file('https://www.bank.lv/vk/ecb_rss.xml', null, LIBXML_NOCDATA);

        foreach($xml->channel->item as $item){

            $created_at = date('Y-m-d', strtotime($item->pubDate));
            $currencies = preg_split('/\d\s/', trim($item->description));

            $list = [];
            foreach($currencies as $currency){
                $parts = preg_split('/\s/', $currency);
                $list[$parts[0]] = $parts[1];
            }

            if (!DB::table('exchange_rates')->where('created_at', '=', $created_at)->count()) {
                foreach($list as $currencyCode => $rate){
                    Currency::create(['currency' => $currencyCode, 'rate' => $rate, 'created_at' => $created_at]);
                }
            }

            // Useful for console output
            dump($list);
        }
    }
}
