<?php

namespace Planpoint\Types;

use Planpoint\Core\SerializableType;
use Planpoint\Core\JsonProperty;

class GroupProject extends SerializableType
{
    /**
     * @var string $id
     */
    #[JsonProperty('_id')]
    public string $id;

    /**
     * @var string $name
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var ?string $namespace
     */
    #[JsonProperty('namespace')]
    public ?string $namespace;

    /**
     * @var ?string $hostName
     */
    #[JsonProperty('hostName')]
    public ?string $hostName;

    /**
     * @var ?bool $paused
     */
    #[JsonProperty('paused')]
    public ?bool $paused;

    /**
     * @param array{
     *   id: string,
     *   name: string,
     *   namespace?: ?string,
     *   hostName?: ?string,
     *   paused?: ?bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->name = $values['name'];
        $this->namespace = $values['namespace'] ?? null;
        $this->hostName = $values['hostName'] ?? null;
        $this->paused = $values['paused'] ?? null;
    }
}
