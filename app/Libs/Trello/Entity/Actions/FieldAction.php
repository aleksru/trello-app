<?php
namespace App\Libs\Trello\Entity\Actions;

use App\Libs\Trello\Entity\ActionInterface;
use App\Libs\Trello\ValueObjects\Field;

interface FieldAction extends ActionInterface
{
    public function getField():Field;
}
