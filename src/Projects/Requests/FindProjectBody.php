<?php

namespace Planpoint\Projects\Requests;

use Planpoint\Core\Json\JsonSerializableType;
use Planpoint\Core\Json\JsonProperty;

class FindProjectBody extends JsonSerializableType
{
    /**
     * @var string $namespace
     */
    #[JsonProperty('namespace')]
    public string $namespace;

    /**
     * @var string $hostName
     */
    #[JsonProperty('hostName')]
    public string $hostName;

    /**
     * @param array{
     *   namespace: string,
     *   hostName: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->namespace = $values['namespace'];
        $this->hostName = $values['hostName'];
    }
}
