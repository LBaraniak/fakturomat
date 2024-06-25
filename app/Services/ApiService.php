<?php

namespace App\Services;

use GuzzleHttp\Client;

class ApiService
{
    public function getCustomers()
    {
        $client = new Client();

        $response = $client->request('GET', 'http://127.0.0.1:8001/api/klienci', [
            'headers' => [
                'Accept' => 'application/json',
                'authorization' => 'Bearer 1|ABjOwURUiigAayiSn4yTLss73rfjWu5cUpa86Zt6e0b4bbaa',
            ]
        ]);


        if ($response->getStatusCode() == 200) {
            $content = json_decode($response->getBody());
            dd($content);
        }

        return null;
    }

    public function postCustomer()
    {
        $client = new Client();

        $response = $client->request('POST', 'http://127.0.0.1:8001/api/klienci/zapisz', [
            'headers' => [
                'Accept' => 'application/json',
                'authorization' => 'Bearer 1|ABjOwURUiigAayiSn4yTLss73rfjWu5cUpa86Zt6e0b4bbaa',
            ],
            'form_params' => [
                'name' => 'klient testowy',
                'address' => '123',
                'nip' => '0123456789'
            ]
        ]);

        return $response->getStatusCode() == 201;
    }
}
