<?php

namespace Planpoint\Types;

use Planpoint\Core\SerializableType;
use Planpoint\Core\JsonProperty;

class ProjectSummary extends SerializableType
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
     * @var ?string $projectType
     */
    #[JsonProperty('projectType')]
    public ?string $projectType;

    /**
     * @var ?string $status
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?string $statusOverride
     */
    #[JsonProperty('statusOverride')]
    public ?string $statusOverride;

    /**
     * @var mixed $paused
     */
    #[JsonProperty('paused')]
    public mixed $paused;

    /**
     * @var ?string $createdAt
     */
    #[JsonProperty('createdAt')]
    public ?string $createdAt;

    /**
     * @param array{
     *   id: string,
     *   name: string,
     *   namespace?: ?string,
     *   hostName?: ?string,
     *   projectType?: ?string,
     *   status?: ?string,
     *   statusOverride?: ?string,
     *   paused: mixed,
     *   createdAt?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->name = $values['name'];
        $this->namespace = $values['namespace'] ?? null;
        $this->hostName = $values['hostName'] ?? null;
        $this->projectType = $values['projectType'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->statusOverride = $values['statusOverride'] ?? null;
        $this->paused = $values['paused'];
        $this->createdAt = $values['createdAt'] ?? null;
    }
}
