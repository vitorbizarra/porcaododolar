<?php

namespace App\Services;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

/**
 * Awesome API
 * @link https://docs.awesomeapi.com.br/api-de-moedas
 */
class AwesomeApiService
{
    private const BASE_URl = 'https://economia.awesomeapi.com.br/json';

    public PendingRequest $api;

    public function __construct()
    {
        $this->api = Http::baseUrl(self::BASE_URl);
    }

    public function last(string $currency)
    {
        try {
            return collect($this->api->get("/last/{$currency}")->json())->toArray();
        } catch (\Exception $e) {
            throw $e;
        }
    }
}
