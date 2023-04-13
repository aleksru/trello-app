<?php

namespace Tests\Unit;

use App\Libs\Trello\Events\Board\CommentCardBoardEvent;
use App\Libs\Trello\Events\Board\CreateCardBoardEvent;
use App\Libs\Trello\Events\Board\UpdateCardBoardEvent;
use App\Libs\Trello\Events\Factory\BoardEventFactory;
use App\Libs\Trello\Input\EventRequest;
use PHPUnit\Framework\TestCase;

class BoardEventFactoryTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_create_card_board_event(): void
    {
        $data = json_decode(file_get_contents(__DIR__ . '/../data/card_create_event.json', FILE_USE_INCLUDE_PATH), true);
        $eventRequest = EventRequest::fromArr($data);
        $boardEventFactory = new BoardEventFactory();
        $cardBoardEvent = $boardEventFactory->createCreateCardBoardEvent($eventRequest);
        $this->assertInstanceOf(CreateCardBoardEvent::class, $cardBoardEvent);
        dump($cardBoardEvent);
    }

    public function test_create_comment_card_board_event(): void
    {
        $data = json_decode(file_get_contents(__DIR__ . '/../data/comment_card_event.json', FILE_USE_INCLUDE_PATH), true);
        $eventRequest = EventRequest::fromArr($data);
        $boardEventFactory = new BoardEventFactory();
        $commentCardBoardEvent = $boardEventFactory->createCommentCardBoardEvent($eventRequest);
        $this->assertInstanceOf(CommentCardBoardEvent::class, $commentCardBoardEvent);
        dump($commentCardBoardEvent);
    }

    public function test_add_comment_update_card_board_event(): void
    {
        $data = json_decode(file_get_contents(__DIR__ . '/../data/add_comment_update_card_board_event.json', FILE_USE_INCLUDE_PATH), true);
        $eventRequest = EventRequest::fromArr($data);
        $boardEventFactory = new BoardEventFactory();
        $updateCardBoardEvent = $boardEventFactory->createUpdateCardBoardEvent($eventRequest);
        $this->assertInstanceOf(UpdateCardBoardEvent::class, $updateCardBoardEvent);
        dump($updateCardBoardEvent);
    }

    public function test_move_to_done_list_update_card_board_event(): void
    {
        $data = json_decode(file_get_contents(__DIR__ . '/../data/move_to_done_list_update_card_board_event.json', FILE_USE_INCLUDE_PATH), true);
        $eventRequest = EventRequest::fromArr($data);
        $boardEventFactory = new BoardEventFactory();
        $updateCardBoardEvent = $boardEventFactory->createUpdateCardBoardEvent($eventRequest);
        $this->assertInstanceOf(UpdateCardBoardEvent::class, $updateCardBoardEvent);
        dump($updateCardBoardEvent);
    }

    public function test_rename_card_update_card_board_event(): void
    {
        $data = json_decode(file_get_contents(__DIR__ . '/../data/rename_card_update_card_event.json', FILE_USE_INCLUDE_PATH), true);
        $eventRequest = EventRequest::fromArr($data);
        $boardEventFactory = new BoardEventFactory();
        $updateCardBoardEvent = $boardEventFactory->createUpdateCardBoardEvent($eventRequest);
        $this->assertInstanceOf(UpdateCardBoardEvent::class, $updateCardBoardEvent);
        dump($updateCardBoardEvent);
    }

    public function test_add_description_update_card_board_event(): void
    {
        $data = json_decode(file_get_contents(__DIR__ . '/../data/add_description_card_update_card_event.json', FILE_USE_INCLUDE_PATH), true);
        $eventRequest = EventRequest::fromArr($data);
        $boardEventFactory = new BoardEventFactory();
        $updateCardBoardEvent = $boardEventFactory->createUpdateCardBoardEvent($eventRequest);
        $this->assertInstanceOf(UpdateCardBoardEvent::class, $updateCardBoardEvent);
        dump($updateCardBoardEvent);
    }

    public function test_closed_update_card_board_event(): void
    {
        $data = json_decode(file_get_contents(__DIR__ . '/../data/closed_card_update_card_event.json', FILE_USE_INCLUDE_PATH), true);
        $eventRequest = EventRequest::fromArr($data);
        $boardEventFactory = new BoardEventFactory();
        $updateCardBoardEvent = $boardEventFactory->createUpdateCardBoardEvent($eventRequest);
        $this->assertInstanceOf(UpdateCardBoardEvent::class, $updateCardBoardEvent);
        dump($updateCardBoardEvent);
    }

    public function test_delete_comment_event(): void
    {
        $data = json_decode(file_get_contents(__DIR__ . '/../data/delete_comment_event.json', FILE_USE_INCLUDE_PATH), true);
        $eventRequest = EventRequest::fromArr($data);
        $boardEventFactory = new BoardEventFactory();
        $updateCardBoardEvent = $boardEventFactory->createUpdateCardBoardEvent($eventRequest);
        $this->assertInstanceOf(UpdateCardBoardEvent::class, $updateCardBoardEvent);
        dump($updateCardBoardEvent);
    }
}
