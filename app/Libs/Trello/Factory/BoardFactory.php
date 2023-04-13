<?php
namespace App\Libs\Trello\Factory;


use App\Libs\Trello\Entity\Board as BoardI;
use App\Libs\Trello\Entity\Impl\Board;
use JetBrains\PhpStorm\Pure;

class BoardFactory
{
    #[Pure] public function createFromArray(array $data): BoardI
    {
        return new Board( $data['id'], $data['desc'], $data['closed'], $data['shortUrl'], $data['url'], $data['name']);
    }
}
