<?php
namespace App\Libs\Pachca;

use App\Libs\Pachca\Data\MessageRequest;
use App\Libs\Pachca\Data\MessageResponse;
use App\Libs\Pachca\Enums\EntityTypeEnum;
use App\Libs\Pachca\Exceptions\TransportException;
use App\Libs\Pachca\Interfaces\ClientFactory;

class PachcaFacade
{
    private ClientFactory $clientFactory;

    public function __construct(ClientFactory $clientFactory)
    {
        $this->clientFactory = $clientFactory;
    }

    /**
     * @param string $sendFromToken
     * @param int $entityId
     * @param string $content
     * @param array $files
     * @return MessageResponse
     */
    public function sendDealMessage(string $sendFromToken, int $entityId, string $content, array $files): MessageResponse
    {
        return $this->sendMessage($sendFromToken, EntityTypeEnum::DEAL, $entityId, $content, $files);
    }

    /**
     * @throws TransportException
     */
    public function sendMessage(string $sendFromToken, string $entityType, int $entityId, string $content, array $files): MessageResponse
    {
        $client = $this->clientFactory->factory($sendFromToken);
        $pachcaClient = new PachcaClient($client);
        $messageRequest = new MessageRequest($entityType, $entityId, $content, $files);
        return $pachcaClient->messages($messageRequest);
    }
}
