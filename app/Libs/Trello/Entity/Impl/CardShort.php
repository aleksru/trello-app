<?php


namespace App\Libs\Trello\Entity\Impl;


use App\Libs\Trello\Enums\EntityType;

class CardShort implements \App\Libs\Trello\Entity\CardShort
{
    public function __construct(
        private string $id,
        private string $idList,
        private string $idBoard,
        private int $idShort,
        private string $shortLink,
        private string $name,
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
    public function getIdList(): string
    {
        return $this->idList;
    }

    /**
     * @return string
     */
    public function getIdBoard(): string
    {
        return $this->idBoard;
    }

    /**
     * @return int
     */
    public function getIdShort(): int
    {
        return $this->idShort;
    }

    /**
     * @return string
     */
    public function getShortLink(): string
    {
        return $this->shortLink;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    public function getType(): string
    {
        return EntityType::CARD;
    }
}
