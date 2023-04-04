<?php
namespace App\Libs\Pachca\Factory;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;

class ClientFactory implements \App\Libs\Pachca\Interfaces\ClientFactory
{
    public function factory(string $token): ClientInterface
    {
        return
            new Client([
                'base_uri' => 'https://api.pachca.com/api/shared/v1/',
                'headers' => [
                    'Authorization' => "Bearer $token",
                    'Accept'     => 'application/json',
                ]
            ]);
    }
}
