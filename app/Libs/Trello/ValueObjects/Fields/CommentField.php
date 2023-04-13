<?php
namespace App\Libs\Trello\ValueObjects\Fields;

use App\Libs\Trello\ValueObjects\Comment;
use App\Libs\Trello\ValueObjects\Field;

class CommentField implements Field
{
    private string $field;
    private Comment $comment;

    public function __construct(string $field, Comment $comment)
    {
        $this->field = $field;
        $this->comment = $comment;
    }

    public function getField(): string
    {
        return $this->field;
    }

    public function getComment(): Comment
    {
        return $this->comment;
    }
}
