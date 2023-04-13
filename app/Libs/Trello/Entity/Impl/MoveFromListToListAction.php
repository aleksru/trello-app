<?php
namespace App\Libs\Trello\Entity\Impl;

use App\Libs\Trello\Entity\Actions\MoveFromListToList;
use App\Libs\Trello\Entity\ListShort;
use App\Libs\Trello\ValueObjects\Field;

class MoveFromListToListAction extends SimpleAction implements MoveFromListToList
{
    public function __construct(
         string $id,
         string $actionType,
         string $date,
         private ListShort $listBefore,
         private ListShort $listAfter,
    ){
        parent::__construct($id, $actionType, $date);
    }
    /**
     * @return ListShort
     */
    public function getListBefore(): ListShort
    {
        return $this->listBefore;
    }

    /**
     * @return ListShort
     */
    public function getListAfter(): ListShort
    {
        return $this->listAfter;
    }

    public function getField(): Field
    {
        // TODO: Implement getField() method.
    }
}
