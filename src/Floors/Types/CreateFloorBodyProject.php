<?php

namespace Planpoint\Floors\Types;

use Planpoint\Core\SerializableType;
use Planpoint\Core\JsonProperty;

class CreateFloorBodyProject extends SerializableType
{
    /**
     * @var string $id
     */
    #[JsonProperty('_id')]
    public string $id;

    /**
     * @param array{
     *   id: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
    }
}
