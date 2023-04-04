<?php
namespace App\Libs\Pachca\Data;

use JetBrains\PhpStorm\Pure;
//"data" => array:6 [
//    "id" => 42700414
//    "entity_type" => "discussion"
//    "entity_id" => 5151030
//    "content" => "Hello world!"
//    "user_id" => 225103
//    "created_at" => "2023-04-04T17:51:26.000Z"
//  ]
class MessageResponse
{
    private int $id;
    private string $entity_type;
    private int $entity_id;
    private string $content;
    private int $user_id;
    private string $created_at;

    public function __construct(int $id, string $entity_type, int $entity_id, string $content, int $user_id, string $created_at)
    {
        $this->id = $id;
        $this->entity_type = $entity_type;
        $this->entity_id = $entity_id;
        $this->content = $content;
        $this->user_id = $user_id;
        $this->created_at = $created_at;
    }

    #[Pure] public static function createFromArray(array $data): MessageResponse
    {
        return new self(
            $data['id'],
            $data['entity_type'],
            $data['entity_id'],
            $data['content'],
            $data['user_id'],
            $data['created_at'],
        );
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getEntityType(): string
    {
        return $this->entity_type;
    }

    /**
     * @return int
     */
    public function getEntityId(): int
    {
        return $this->entity_id;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->user_id;
    }

    /**
     * @return string
     */
    public function getCreatedAt(): string
    {
        return $this->created_at;
    }
}
