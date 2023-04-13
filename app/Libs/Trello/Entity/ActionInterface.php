<?php
namespace App\Libs\Trello\Entity;

interface ActionInterface extends ShortEntity
{
    public function getDate():string;
    public function getActionType():string;
}
