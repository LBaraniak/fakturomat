<?php

namespace App\Services;

use GuzzleHttp\Client;

class NbpService
{
    public function getUsdRate()
    {
        $client = new Client();

        $response = $client->request('GET', 'http://api.nbp.pl/api/exchangerates/rates/A/USD/', [
            'headers' => [
                'Accept' => 'application/json',
            ]
        ]);


        if ($response->getStatusCode() == 200) {
            $content = json_decode($response->getBody());
            return $content->rates[0]->mid;
        }

        return null;
    }
}
