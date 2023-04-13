<?php
namespace App\Libs\Trello\Events\Factory;

use App\Libs\Trello\Events\Board\CommentCardBoardEvent;
use App\Libs\Trello\Events\Board\CreateCardBoardEvent;
use App\Libs\Trello\Events\Board\UpdateCardBoardEvent;
use App\Libs\Trello\Factory\ActionFactory;
use App\Libs\Trello\Factory\BoardFactory;
use App\Libs\Trello\Factory\CardFactory;
use App\Libs\Trello\Factory\ListFactory;
use App\Libs\Trello\Factory\MemberFactory;
use App\Libs\Trello\Input\EventRequest;
use App\Libs\Trello\ValueObjects\Comment;

class BoardEventFactory
{
    //todo to interfaces
    private BoardFactory $boardFactory;
    private MemberFactory $memberFactory;
    private ActionFactory $actionFactory;
    private CardFactory $cardFactory;
    private ListFactory $listFactory;
    private CardActionFactory $cardActionFactory;

    /**
     * BoardEventFactory constructor.
     */
    public function __construct()
    {
        $this->boardFactory = new BoardFactory();
        $this->memberFactory = new MemberFactory();
        $this->actionFactory = new ActionFactory();
        $this->cardFactory = new CardFactory();
        $this->listFactory = new ListFactory();
        $this->cardActionFactory = new CardActionFactory();
    }


    public function createCreateCardBoardEvent(EventRequest $eventRequest): CreateCardBoardEvent
    {
        $board = $this->boardFactory->createFromArray($eventRequest->getModel());
        $memberCreator = $this->memberFactory->createShortFromArray($eventRequest->getActionMemberCreator());
        $action = $this->actionFactory->createSimpleAction($eventRequest->getAction());
        $requestActionData = $eventRequest->getActionData();
        $card = $this->cardFactory->createShortFromArray(
            array_merge(
                $requestActionData['card'],
                ['idList' => $requestActionData['list']['id']],
                ['idBoard' => $requestActionData['board']['id']]
            )
        );
        $list = $this->listFactory->createShortFromArray($requestActionData['list']);

        return new CreateCardBoardEvent($board, $memberCreator, $action, $card, $list);
    }

    public function createCommentCardBoardEvent(EventRequest $eventRequest): CommentCardBoardEvent
    {
        $board = $this->boardFactory->createFromArray($eventRequest->getModel());
        $memberCreator = $this->memberFactory->createShortFromArray($eventRequest->getActionMemberCreator());
        $action = $this->actionFactory->createSimpleAction($eventRequest->getAction());
        $requestActionData = $eventRequest->getActionData();
        $list = $this->listFactory->createShortFromArray($requestActionData['list']);
        $card = $this->cardFactory->createShortFromArray(
            array_merge(
                $requestActionData['card'],
                ['idList' => $requestActionData['list']['id']],
                ['idBoard' => $requestActionData['board']['id']]
            )
        );
        return
            new CommentCardBoardEvent(
                $board,
                $memberCreator,
                $action,
                $card,
                $list,
                new Comment($requestActionData['text'])
            );
    }

    public function createUpdateCardBoardEvent(EventRequest $eventRequest): UpdateCardBoardEvent
    {
        $board = $this->boardFactory->createFromArray($eventRequest->getModel());
        $memberCreator = $this->memberFactory->createShortFromArray($eventRequest->getActionMemberCreator());
        $requestActionData = $eventRequest->getActionData();

        //todo
        if(isset($requestActionData['list'])){
            $listData = $requestActionData['list'];
        }elseif(isset($requestActionData['listAfter'])){
            $listData = $requestActionData['listAfter'];
        }else{
            $listData = ['id' => '0', 'name' => 'Список не указан'];
        }
        $list = $this->listFactory->createShortFromArray($listData);
        $card = $this->cardFactory->createShortFromArray(
            array_merge(
                $requestActionData['card'],
                ['idList' => $listData['id']],
                ['idBoard' => $requestActionData['board']['id']]
            )
        );
        $action = $this->cardActionFactory->factory($eventRequest);

        return new UpdateCardBoardEvent($board, $memberCreator, $action, $card, $list);
    }
}
