<?php
namespace App\Libs\Trello\Events\Board;

use App\Libs\Trello\Entity\ActionInterface;
use App\Libs\Trello\Entity\Board;
use App\Libs\Trello\Entity\CardShort;
use App\Libs\Trello\Entity\ListShort;
use App\Libs\Trello\Entity\MemberShort;

abstract class CardBoardEvent extends BaseBoardEvent
{
    private CardShort $cardShort;
    private ListShort $listShort;

    public function __construct(Board $board, MemberShort $memberShort, ActionInterface $action, CardShort $cardShort, ListShort $listShort)
    {
        parent::__construct($board, $memberShort, $action);
        $this->cardShort = $cardShort;
        $this->listShort = $listShort;
    }

    public function getCard(): CardShort
    {
        return $this->cardShort;
    }

    public function getList(): ListShort
    {
        return $this->listShort;
    }
}
