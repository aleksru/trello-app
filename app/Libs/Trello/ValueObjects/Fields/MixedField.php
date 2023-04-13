<?php


namespace App\Libs\Trello\ValueObjects\Fields;


use App\Libs\Trello\ValueObjects\Field;

class MixedField implements Field
{
    private string $field;
    private mixed $value;

    public function __construct(string $field, mixed $value)
    {
        $this->field = $field;
        $this->value = $value;
    }

    public function getField(): string
    {
        return $this->field;
    }

    public function getValue(): mixed
    {
        return $this->value;
    }
}
