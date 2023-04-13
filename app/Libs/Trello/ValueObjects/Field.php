<?php
namespace App\Libs\Trello\ValueObjects;

interface Field
{
    /**
     * @return string
     */
    public function getField(): string;
}
