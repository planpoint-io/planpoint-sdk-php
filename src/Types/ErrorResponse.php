<?php

namespace Planpoint\Types;

use Planpoint\Core\SerializableType;
use Planpoint\Core\JsonProperty;

class ErrorResponse extends SerializableType
{
    /**
     * @var string $message
     */
    #[JsonProperty('message')]
    public string $message;

    /**
     * @var mixed $paused
     */
    #[JsonProperty('paused')]
    public mixed $paused;

    /**
     * @param array{
     *   message: string,
     *   paused: mixed,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->message = $values['message'];
        $this->paused = $values['paused'];
    }
}
