<?php
namespace App\Libs\Trello\Entity;

interface Board extends ShortEntity
{
    public function getDesc():string;
    public function getClosed():bool;
    public function getShortUrl():string;
    public function getUrl():string;
    public function getName():string;
}
