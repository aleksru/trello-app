<?php


namespace App\Libs\Trello\Entity\Impl;


use App\Libs\Trello\Enums\EntityType;

class MemberShort implements \App\Libs\Trello\Entity\MemberShort
{
    public function __construct(
        private string $id,
        private string $fullName,
        private string $username,
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
    public function getFullName(): string
    {
        return $this->fullName;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    public function getType(): string
    {
        return EntityType::MEMBER;
    }
}
