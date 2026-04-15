<?php

namespace Planpoint\Types;

use Planpoint\Core\Json\JsonSerializableType;
use Planpoint\Core\Json\JsonProperty;
use Planpoint\Core\Types\ArrayType;

class Floor extends JsonSerializableType
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
     * @var ?float $level
     */
    #[JsonProperty('level')]
    public ?float $level;

    /**
     * @var ?array<Unit> $units
     */
    #[JsonProperty('units'), ArrayType([Unit::class])]
    public ?array $units;

    /**
     * @var ?string $image
     */
    #[JsonProperty('image')]
    public ?string $image;

    /**
     * @param array{
     *   id: string,
     *   name?: ?string,
     *   level?: ?float,
     *   units?: ?array<Unit>,
     *   image?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->name = $values['name'] ?? null;
        $this->level = $values['level'] ?? null;
        $this->units = $values['units'] ?? null;
        $this->image = $values['image'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
