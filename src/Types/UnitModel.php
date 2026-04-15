<?php

namespace Planpoint\Types;

use Planpoint\Core\SerializableType;
use Planpoint\Core\JsonProperty;

class UnitModel extends SerializableType
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
     * @var ?string $floorplan
     */
    #[JsonProperty('floorplan')]
    public ?string $floorplan;

    /**
     * @param array{
     *   id: string,
     *   name?: ?string,
     *   floorplan?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->name = $values['name'] ?? null;
        $this->floorplan = $values['floorplan'] ?? null;
    }
}
