<?php
namespace App\Libs\Trello\Factory;

use App\Libs\Trello\Entity\Impl\ListShort;
use App\Libs\Trello\Entity\ListShort as ListShortI;
use JetBrains\PhpStorm\Pure;

class ListFactory
{
    #[Pure] public function createShortFromArray(array $data):ListShortI
    {
        return new ListShort($data['id'], $data['name']);
    }
}
