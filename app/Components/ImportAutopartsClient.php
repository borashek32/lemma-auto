<?php


namespace App\Components;


use GuzzleHttp\Client;

class ImportAutopartsClient
{
    public $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'http://api.favorit-parts.ru/hs',
            'key'      => '30D2E199-5AAE-4837-AABD-74518EE085FD',
            'verify'   => false,
            'timeout'  => 2.0,
        ]);
    }
}