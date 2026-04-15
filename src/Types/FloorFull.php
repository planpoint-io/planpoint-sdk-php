<?php

namespace Planpoint\Types;

use Planpoint\Core\SerializableType;
use Planpoint\Core\JsonProperty;
use Planpoint\Core\ArrayType;

class FloorFull extends SerializableType
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
     * @var string $project
     */
    #[JsonProperty('project')]
    public string $project;

    /**
     * @var ?float $level
     */
    #[JsonProperty('level')]
    public ?float $level;

    /**
     * @var ?float $position
     */
    #[JsonProperty('position')]
    public ?float $position;

    /**
     * @var ?string $path
     */
    #[JsonProperty('path')]
    public ?string $path;

    /**
     * @var ?array<string> $alternativePaths
     */
    #[JsonProperty('alternativePaths'), ArrayType(['string'])]
    public ?array $alternativePaths;

    /**
     * @var ?string $image
     */
    #[JsonProperty('image')]
    public ?string $image;

    /**
     * @param array{
     *   id: string,
     *   name?: ?string,
     *   project: string,
     *   level?: ?float,
     *   position?: ?float,
     *   path?: ?string,
     *   alternativePaths?: ?array<string>,
     *   image?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->name = $values['name'] ?? null;
        $this->project = $values['project'];
        $this->level = $values['level'] ?? null;
        $this->position = $values['position'] ?? null;
        $this->path = $values['path'] ?? null;
        $this->alternativePaths = $values['alternativePaths'] ?? null;
        $this->image = $values['image'] ?? null;
    }
}
