<?php
namespace App\Libs\Trello\Entity;

interface CardShort extends ShortEntity
{
    public function getIdList():string;
    public function getIdBoard():string;
    public function getIdShort():int;
    public function getShortLink():string;
    public function getName():string;
}
