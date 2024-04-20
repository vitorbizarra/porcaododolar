<?php

namespace App\Services\Entities;

use Illuminate\Support\Carbon;

class Cotation
{
    public $code;

    public $codein;

    public $name;

    public $high;

    public $low;

    public $varBid;

    public $pctChange;

    public $bid;

    public $ask;

    public $timestamp;

    public $create_date;

    public function __construct(mixed $data)
    {
        $firstKey = array_key_first($data);

        $this->code = data_get($data[$firstKey], 'code');

        $this->codein = data_get($data[$firstKey], 'codein');

        $this->name = data_get($data[$firstKey], 'name');

        $this->high = data_get($data[$firstKey], 'high');

        $this->low = data_get($data[$firstKey], 'low');

        $this->varBid = data_get($data[$firstKey], 'varBid');

        $this->pctChange = data_get($data[$firstKey], 'pctChange');

        $this->bid = data_get($data[$firstKey], 'bid');

        $this->ask = data_get($data[$firstKey], 'ask');

        $this->timestamp = Carbon::createFromTimestamp(data_get($data[$firstKey], 'timestamp'));

        $this->create_date = data_get($data[$firstKey], 'create_date');
    }
}
