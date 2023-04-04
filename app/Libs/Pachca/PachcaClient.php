<?php
namespace App\Libs\Pachca;

use App\Libs\Pachca\Data\MessageRequest;
use App\Libs\Pachca\Data\MessageResponse;
use App\Libs\Pachca\Exceptions\TransportException;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\GuzzleException;

class PachcaClient
{
    private ClientInterface $client;

    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * @param MessageRequest $message
     * @return MessageResponse
     * @throws TransportException
     */
    public function messages(MessageRequest $message): MessageResponse
    {
        $response = $this->send('POST', 'messages', ['message' => $message]);
        return MessageResponse::createFromArray($response['data']);
    }

    /**
     * @param string $method
     * @param string $uri
     * @param array $json
     * @return mixed
     * @throws TransportException
     */
    private function send(string $method, string $uri, array $json): mixed
    {
        try {
            $response = $this->client->request($method, $uri, compact('json'));
            return json_decode($response->getBody()->getContents(), true);
        } catch (GuzzleException $e) {
            throw new TransportException($e->getMessage(), $e->getCode(), $e->getPrevious());
        }
    }
}
