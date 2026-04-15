<?php

namespace Planpoint\Types;

use Planpoint\Core\Json\JsonSerializableType;
use Planpoint\Core\Json\JsonProperty;
use Planpoint\Core\Types\Union;

class ProjectSummary extends JsonSerializableType
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
     * @var (
     *    bool
     *   |ProjectSummaryPausedReason
     * )|null $paused
     */
    #[JsonProperty('paused'), Union('bool', ProjectSummaryPausedReason::class, 'null')]
    public bool|ProjectSummaryPausedReason|null $paused;

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
     *   paused?: (
     *    bool
     *   |ProjectSummaryPausedReason
     * )|null,
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
        $this->paused = $values['paused'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
