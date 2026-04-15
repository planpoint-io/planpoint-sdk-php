<?php

namespace Planpoint\Floors\Requests;

use Planpoint\Core\SerializableType;
use Planpoint\Floors\Types\CreateFloorBodyProject;
use Planpoint\Core\JsonProperty;
use Planpoint\Core\ArrayType;

class CreateFloorBody extends SerializableType
{
    /**
     * @var CreateFloorBodyProject $project
     */
    #[JsonProperty('project')]
    public CreateFloorBodyProject $project;

    /**
     * @var string $name
     */
    #[JsonProperty('name')]
    public string $name;

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
     * @param array{
     *   project: CreateFloorBodyProject,
     *   name: string,
     *   position?: ?float,
     *   path?: ?string,
     *   alternativePaths?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->project = $values['project'];
        $this->name = $values['name'];
        $this->position = $values['position'] ?? null;
        $this->path = $values['path'] ?? null;
        $this->alternativePaths = $values['alternativePaths'] ?? null;
    }
}
