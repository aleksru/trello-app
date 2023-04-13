<?php
namespace App\Libs\Trello\Entity\Impl;


class UnknownAction extends SimpleAction
{
    public function __construct(
        string $id,
        string $actionType,
        string $date,
        private array $actionData
    ){
        parent::__construct($id, $actionType, $date);
    }

    public function getActionData(): array
    {
        return $this->actionData;
    }
}
