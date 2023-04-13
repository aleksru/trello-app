<?php
namespace App\Libs\Trello\Factory;

use App\Libs\Trello\Entity\ActionInterface;
use App\Libs\Trello\Entity\Actions\ChangeFieldAction as ChangeFieldActionI;
use App\Libs\Trello\Entity\Actions\FieldAction as FieldActionI;
use App\Libs\Trello\Entity\Actions\MoveFromListToList;
use App\Libs\Trello\Entity\Impl\ChangeFieldAction;
use App\Libs\Trello\Entity\Impl\FieldAction;
use App\Libs\Trello\Entity\Impl\MoveFromListToListAction;
use App\Libs\Trello\Entity\Impl\SimpleAction;
use App\Libs\Trello\Entity\Impl\UnknownAction;
use App\Libs\Trello\Entity\ListShort;
use App\Libs\Trello\ValueObjects\Field;
use JetBrains\PhpStorm\Pure;

class ActionFactory
{
    #[Pure] public function createSimpleAction(array $data): ActionInterface
    {
        return new SimpleAction($data['id'], $data['type'], $data['date']);
    }

    public function createUnknownAction(array $data): UnknownAction
    {
        return new UnknownAction($data['id'], $data['type'], $data['date'], $data);
    }

    public function createMoveFromListToListFromArray(array $data, ListShort $listBefore, ListShort $listAfter): MoveFromListToList
    {
        return new MoveFromListToListAction($data['id'], $data['type'], $data['date'], $listBefore, $listAfter);
    }

    public function createFieldActionFromArray(array $data, Field $field): FieldActionI
    {
        return new FieldAction($data['id'], $data['type'], $data['date'], $field);
    }

    public function createChangeFieldFromArray(array $data, Field $old, Field $new): ChangeFieldActionI
    {
        return new ChangeFieldAction($data['id'], $data['type'], $data['date'], $new, $old);
    }
}
