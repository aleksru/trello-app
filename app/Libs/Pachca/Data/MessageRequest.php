<?php
namespace App\Libs\Pachca\Data;

use App\Libs\Pachca\Data\Parts\File;

//entity_type	string	Тип сущности: сделка (по умолчанию, deal), беседа/канал/чат комментариев (discussion), пользователь (user)
//entity_id	integer*	Идентификатор сущности
//content	string*	Текст сообщения
class MessageRequest implements \JsonSerializable
{
    private string $entity_type;
    private int $entity_id;
    private string $content;
    /**
     * @var File[]
     */
    private array $files;

    public function __construct(string $entity_type, int $entity_id, string $content, array $files)
    {
        $this->entity_type = $entity_type;
        $this->entity_id = $entity_id;
        $this->content = $content;
        $this->files = $files;
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
     * @return File[]
     */
    public function getFiles(): array
    {
        return $this->files;
    }

    public function jsonSerialize()
    {
        return array_merge(get_object_vars($this), ['files' => array_map(fn(File $file) => $file->jsonSerialize(), $this->getFiles())]);
    }
}
