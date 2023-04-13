<?php
namespace App\Libs\Trello\Entity\Impl;

use App\Libs\Trello\Entity\ActionInterface;
use App\Libs\Trello\Enums\EntityType;

class SimpleAction implements ActionInterface
{
    public function __construct(
        private string $id,
        private string $actionType,
        private string $date,
    ){}

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getActionType(): string
    {
        return $this->actionType;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return EntityType::ACTION;
    }

    /**
     * @return string
     */
    public function getDate(): string
    {
        return $this->date;
    }
}
