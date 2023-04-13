<?php
namespace App\Libs\Trello\Entity;

interface ShortEntity
{
    public function getId():string;
    public function getType():string;
}
