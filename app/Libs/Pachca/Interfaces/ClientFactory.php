<?php
namespace App\Libs\Pachca\Interfaces;

use GuzzleHttp\ClientInterface;

interface ClientFactory
{
    public function factory(string $token): ClientInterface;
}
