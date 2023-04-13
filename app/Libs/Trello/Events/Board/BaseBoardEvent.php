<?php
namespace App\Libs\Trello\Events\Board;

use App\Libs\Trello\Entity\ActionInterface;
use App\Libs\Trello\Entity\Board;
use App\Libs\Trello\Entity\MemberShort;

abstract class BaseBoardEvent
{
    private Board $board;
    private MemberShort $memberShort;
    private ActionInterface $action;

    /**
     * BaseBoardEvent constructor.
     * @param Board $board
     * @param MemberShort $memberShort
     * @param ActionInterface $action
     */
    public function __construct(Board $board, MemberShort $memberShort, ActionInterface $action)
    {
        $this->board = $board;
        $this->memberShort = $memberShort;
        $this->action = $action;
    }

    public function getAction(): ActionInterface
    {
        return $this->action;
    }

    public function getActionType():string
    {
        return $this->action->getType();
    }

    public function getBoard(): Board
    {
        return $this->board;
    }

    public function getMemberCreator(): MemberShort
    {
        return $this->memberShort;
    }
}
