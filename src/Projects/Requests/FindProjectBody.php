<?php

namespace Planpoint\Projects\Requests;

use Planpoint\Core\SerializableType;
use Planpoint\Core\JsonProperty;

class FindProjectBody extends SerializableType
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
