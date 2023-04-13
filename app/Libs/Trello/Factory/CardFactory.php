<?php
namespace App\Libs\Trello\Factory;

use App\Libs\Trello\Entity\CardShort as CardShortI;
use App\Libs\Trello\Entity\Impl\CardShort;
use JetBrains\PhpStorm\Pure;

class CardFactory
{
    #[Pure] public function createShortFromArray(array $data): CardShortI
    {
        return
             new CardShort(
                 $data['id'],
                 $data['idList'],
                 $data['idBoard'],
                 $data['idShort'],
                 $data['shortLink'],
                 $data['name']
             );
    }
}
