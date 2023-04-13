<?php
namespace App\Libs\Trello\Entity\Actions;

use App\Libs\Trello\Entity\ListShort;

interface MoveFromListToList extends FieldAction
{
    public function getListBefore(): ListShort;
    public function getListAfter(): ListShort;
}
