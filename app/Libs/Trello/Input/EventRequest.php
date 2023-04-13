<?php
namespace App\Libs\Trello\Input;

use JetBrains\PhpStorm\Pure;

class EventRequest
{
    public array $model;
    public array $action;

    public function __construct(array $model, array $action)
    {
        $this->model = $model;
        $this->action = $action;
    }

    #[Pure] public static function fromArr(array $data): static
    {
        return new static($data['model'], $data['action']);
    }

    /**
     * @return array
     */
    public function getModel(): array
    {
        return $this->model;
    }

    /**
     * @return array
     */
    public function getAction(): array
    {
        return $this->action;
    }

    /**
     * @return array
     */
    public function getActionData(): array
    {
        return $this->action['data'];
    }

    public function getActionType(): string
    {
        return $this->action["type"];
    }

    public function getActionMemberCreator():array
    {
        return $this->action['memberCreator'];
    }
}
