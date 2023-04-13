<?php
namespace App\Libs\Trello\Entity\Impl;

use App\Libs\Trello\Entity\Actions\ChangeFieldAction as ChangeFieldActionI;
use App\Libs\Trello\ValueObjects\Field;

class ChangeFieldAction extends FieldAction implements ChangeFieldActionI
{
    public function __construct(
        string $id,
        string $actionType,
        string $date,
        Field $field,
        private Field $old
    ){
        parent::__construct($id, $actionType, $date, $field);
    }
    /**
     * @return Field
     */
    public function getOld(): Field
    {
        return $this->old;
    }
}
