<?php

namespace App\Console\Commands;

use App\Services\AwesomeApiService;
use Illuminate\Console\Command;
use Atymic\Twitter\Contract\Http\Client;
use Atymic\Twitter\Facade\Twitter;

class TweetDollarCotation extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:tweet-dollar-cotation';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'An command to tweet about dollar cotation on https://x.com/porcaododolar';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $response = (new AwesomeApiService)->last('USD-BRL');

        $dateTime = $response->timestamp->format('d/m/Y à\s H:i:s');

        $querier = Twitter::forApiV2()->getQuerier();

        $value = number_format(num: $response->bid, decimals: 2, decimal_separator: ',', thousands_separator: '.');

        $result = $querier->post(
            'tweets',
            [
                Client::KEY_REQUEST_FORMAT => Client::REQUEST_FORMAT_JSON,
                'text' => "Cotação de: {$dateTime}\n\n1.00 Dólar está igual a {$value} reais."
            ]
        );
    }
}
