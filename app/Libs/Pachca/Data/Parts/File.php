<?php
namespace App\Libs\Pachca\Data\Parts;
//key	string*	Путь к файлу, полученный в результате загрузки файла (каждый файл в каждом сообщении должен иметь свой уникальный key, не допускается использование одного и того же key в разных сообщениях)
//name	string*	Название файла, которое вы хотите отображать пользователю (рекомендуется писать вместе с расширением)
//file_type	string*	Тип файла: файл (file), изображение (image)
//size	integer*	Размер файла в байтах, отображаемый пользователю
use JsonSerializable;

class File implements JsonSerializable
{
    private string $key;
    private string $name;
    private string $file_type;
    private int $size;

    public function __construct(string $key, string $name, string $file_type, int $size)
    {
        $this->key = $key;
        $this->name = $name;
        $this->file_type = $file_type;
        $this->size = $size;
    }

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}
