<?php
namespace App\Libs\Trello\Events\Board;

use App\Libs\Trello\Entity\ActionInterface;
use App\Libs\Trello\Entity\Board;
use App\Libs\Trello\Entity\CardShort;
use App\Libs\Trello\Entity\ListShort;
use App\Libs\Trello\Entity\MemberShort;
use App\Libs\Trello\ValueObjects\Comment;

class CommentCardBoardEvent extends CardBoardEvent
{
    private Comment $comment;

    public function __construct(Board $board, MemberShort $memberShort, ActionInterface $action, CardShort $cardShort,
                                ListShort $listShort, Comment $comment)
    {
        parent::__construct($board, $memberShort, $action, $cardShort, $listShort);
        $this->comment = $comment;
    }
    public function getComment():Comment
    {
        return $this->comment;
    }
}
