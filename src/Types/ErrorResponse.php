<?php

namespace Planpoint\Types;

use Planpoint\Core\Json\JsonSerializableType;
use Planpoint\Core\Json\JsonProperty;
use Planpoint\Core\Types\Union;

class ErrorResponse extends JsonSerializableType
{
    /**
     * @var string $message
     */
    #[JsonProperty('message')]
    public string $message;

    /**
     * @var (
     *    bool
     *   |ErrorResponsePausedReason
     * )|null $paused
     */
    #[JsonProperty('paused'), Union('bool', ErrorResponsePausedReason::class, 'null')]
    public bool|ErrorResponsePausedReason|null $paused;

    /**
     * @param array{
     *   message: string,
     *   paused?: (
     *    bool
     *   |ErrorResponsePausedReason
     * )|null,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->message = $values['message'];
        $this->paused = $values['paused'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
