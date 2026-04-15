<?php

namespace Planpoint\Types;

use Planpoint\Core\SerializableType;
use Planpoint\Core\JsonProperty;
use Planpoint\Core\ArrayType;

class Collection extends SerializableType
{
    /**
     * @var string $id
     */
    #[JsonProperty('_id')]
    public string $id;

    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?array<string> $units
     */
    #[JsonProperty('units'), ArrayType(['string'])]
    public ?array $units;

    /**
     * @param array{
     *   id: string,
     *   name?: ?string,
     *   units?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->name = $values['name'] ?? null;
        $this->units = $values['units'] ?? null;
    }
}
