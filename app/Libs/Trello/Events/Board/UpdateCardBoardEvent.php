<?php
namespace App\Libs\Trello\Events\Board;

use App\Libs\Trello\Entity\ActionInterface;
use App\Libs\Trello\Entity\Board;
use App\Libs\Trello\Entity\CardShort;
use App\Libs\Trello\Entity\ListShort;
use App\Libs\Trello\Entity\MemberShort;

class UpdateCardBoardEvent extends CardBoardEvent
{
//    public function __construct(Board $board, MemberShort $memberShort, ActionInterface $action, CardShort $cardShort, ListShort $listShort)
//    {
//        parent::__construct($board, $memberShort, $action, $cardShort, $listShort);
//    }
}
