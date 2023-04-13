<?php
namespace App\Libs\Trello\ValueObjects;

class Comment
{
    private string $text;

    public function __construct(string $text)
    {
        $this->text = $text;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }
}
