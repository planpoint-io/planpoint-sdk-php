<?php

namespace Planpoint\Groups\Requests;

use Planpoint\Core\Json\JsonSerializableType;
use Planpoint\Core\Json\JsonProperty;

class CreateGroupBody extends JsonSerializableType
{
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
     * @var ?string $type
     */
    #[JsonProperty('type')]
    public ?string $type;

    /**
     * @var ?string $propertyType
     */
    #[JsonProperty('propertyType')]
    public ?string $propertyType;

    /**
     * @param array{
     *   name: string,
     *   namespace?: ?string,
     *   hostName?: ?string,
     *   type?: ?string,
     *   propertyType?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'];
        $this->namespace = $values['namespace'] ?? null;
        $this->hostName = $values['hostName'] ?? null;
        $this->type = $values['type'] ?? null;
        $this->propertyType = $values['propertyType'] ?? null;
    }
}
