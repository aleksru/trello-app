<?php
namespace App\Libs\Trello\Entity;


interface MemberShort extends ShortEntity
{
    public function getFullName():string;
    public function getUsername():string;
}
