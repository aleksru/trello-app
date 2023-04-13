<?php
namespace App\Libs\Trello\Events\Factory;

use App\Libs\Trello\Entity\ActionInterface;
use App\Libs\Trello\Entity\Actions\ChangeFieldAction;
use App\Libs\Trello\Entity\Actions\FieldAction;
use App\Libs\Trello\Entity\Actions\MoveFromListToList;
use App\Libs\Trello\Enums\ActionType;
use App\Libs\Trello\Factory\ActionFactory;
use App\Libs\Trello\Factory\ListFactory;
use App\Libs\Trello\Input\EventRequest;
use App\Libs\Trello\ValueObjects\Comment;
use App\Libs\Trello\ValueObjects\Fields\CommentField;
use App\Libs\Trello\ValueObjects\Fields\MixedField;

class CardActionFactory
{
    private ActionFactory $actionFactory;
    private ListFactory $listFactory;

    /**
     * CardActionFactory constructor.
     */
    public function __construct()
    {
        $this->actionFactory = new ActionFactory();
        $this->listFactory = new ListFactory();
    }

    public function factory(EventRequest $eventRequest): ActionInterface
    {
        if(ActionType::COMMENT_CARD === $eventRequest->getActionType()){
            return $this->factoryCommentCard($eventRequest);
        }
        $actionData = $eventRequest->getActionData();
        if(array_key_exists('old', $actionData)){
            $fieldName = array_key_first($actionData['old']);
            if($fieldName === "idList"){
                return $this->factoryMoveFromListToList($eventRequest);
            }
            return $this->factoryChangeField($eventRequest);
        }
        return $this->actionFactory->createUnknownAction($eventRequest->getAction());
    }

    public function factoryChangeField(EventRequest $eventRequest): ChangeFieldAction
    {
        $actionData = $eventRequest->getActionData();
        $oldField = array_key_first($actionData['old']);
        return
            $this->actionFactory->createChangeFieldFromArray(
                $eventRequest->getAction(),
                new MixedField($oldField, $actionData['old'][$oldField]),
                new MixedField($oldField, $actionData['card'][$oldField])
            );
    }

    public function factoryMoveFromListToList(EventRequest $eventRequest): MoveFromListToList
    {
        $actionData = $eventRequest->getActionData();
        return
            $this->actionFactory->createMoveFromListToListFromArray(
                $eventRequest->getAction(),
                $this->listFactory->createShortFromArray($actionData["listBefore"]),
                $this->listFactory->createShortFromArray($actionData["listAfter"]),
            );
    }

    public function factoryCommentCard(EventRequest $eventRequest): FieldAction
    {
        $actionData = $eventRequest->getActionData();
        return $this->actionFactory->createFieldActionFromArray($eventRequest->getAction(), new CommentField("comment", new Comment($actionData["text"])));
    }
}
