<?php
namespace App\Libs\Trello\Entity\Actions;

use App\Libs\Trello\ValueObjects\Field;

interface ChangeFieldAction extends FieldAction
{
    public function getOld():Field;
}
