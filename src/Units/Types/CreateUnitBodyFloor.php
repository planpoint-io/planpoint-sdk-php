<?php

namespace Planpoint\Units\Types;

use Planpoint\Core\SerializableType;
use Planpoint\Core\JsonProperty;

class CreateUnitBodyFloor extends SerializableType
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
