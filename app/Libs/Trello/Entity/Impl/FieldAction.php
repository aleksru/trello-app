<?php
namespace App\Libs\Trello\Entity\Impl;

use App\Libs\Trello\Entity\Actions\FieldAction as FieldActionI;
use App\Libs\Trello\ValueObjects\Field;

class FieldAction extends SimpleAction implements FieldActionI
{
    public function __construct(
        string $id,
        string $actionType,
        string $date,
        private Field $field
    ){
        parent::__construct($id, $actionType, $date);
    }

    public function getField(): Field
    {
        return $this->field;
    }
}
