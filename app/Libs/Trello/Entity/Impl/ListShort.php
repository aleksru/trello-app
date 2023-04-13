<?php
namespace App\Libs\Trello\Entity\Impl;


use App\Libs\Trello\Enums\EntityType;

class ListShort implements \App\Libs\Trello\Entity\ListShort
{
    public function __construct(
        private string $id,
        private string $name
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
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return EntityType::LIST;
    }
}
