<?php
namespace Tests\Feature\Pachca;

use App\Libs\Pachca\Data\MessageRequest;
use App\Libs\Pachca\Data\MessageResponse;
use App\Libs\Pachca\Enums\EntityTypeEnum;
use App\Libs\Pachca\Factory\ClientFactory;
use App\Libs\Pachca\PachcaClient;
use Tests\TestCase;

class PachcaApiTest extends TestCase
{
    public function test_send_message()
    {
        $client = (new ClientFactory())->factory(config('pachca.test.token'));
        $pachcaClient = new PachcaClient($client);
        $mr = new MessageRequest(EntityTypeEnum::DISCUSSION, config('pachca.test.discussion.entity_id'), 'Hello world!', []);
        $response = $pachcaClient->messages($mr);
        $this->assertInstanceOf(MessageResponse::class, $response);
        $this->assertEquals('Hello world!', $response->getContent());
        $this->assertEquals(EntityTypeEnum::DISCUSSION, $response->getEntityType());
        $this->assertEquals(config('pachca.test.discussion.entity_id'), $response->getEntityId());
    }
}
