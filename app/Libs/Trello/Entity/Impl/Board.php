<?php


namespace App\Libs\Trello\Entity\Impl;


use App\Libs\Trello\Enums\EntityType;

class Board implements \App\Libs\Trello\Entity\Board
{
    /**
     * Board constructor.
     * @param string $id
     * @param string $desc
     * @param bool $closed
     * @param string $shortUrl
     * @param string $url
     * @param string $name
     */
    public function __construct(
        private string $id,
        private string $desc,
        private bool $closed,
        private string $shortUrl,
        private string $url,
        private string $name
    )
    {}

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
    public function getDesc(): string
    {
        return $this->desc;
    }

    /**
     * @return bool
     */
    public function getClosed(): bool
    {
        return $this->closed;
    }

    /**
     * @return string
     */
    public function getShortUrl(): string
    {
        return $this->shortUrl;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
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
        return EntityType::BOARD;
    }
}
