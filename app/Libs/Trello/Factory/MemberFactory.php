<?php
namespace App\Libs\Trello\Factory;


use App\Libs\Trello\Entity\Impl\MemberShort;
use App\Libs\Trello\Entity\MemberShort as MemberShortI;
use JetBrains\PhpStorm\Pure;

class MemberFactory
{
    #[Pure] public function createShortFromArray(array $data): MemberShortI
    {
        return new MemberShort($data['id'], $data['fullName'], $data['username']);
    }
}
