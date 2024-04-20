<?php

use Atymic\Twitter\Contract\Http\Client;
use Atymic\Twitter\Facade\Twitter;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tweet', function () {
    $querier = Twitter::forApiV2()->getQuerier();
    $result = $querier->post(
        'tweets',
        [
            Client::KEY_REQUEST_FORMAT => Client::REQUEST_FORMAT_JSON,
            'text' => "my tweet com quebra de linha"
        ]
    );

    dd($result);
});
