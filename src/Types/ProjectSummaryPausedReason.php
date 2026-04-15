<?php

namespace Planpoint\Types;

use Planpoint\Core\SerializableType;
use Planpoint\Core\JsonProperty;

class ProjectSummaryPausedReason extends SerializableType
{
    /**
     * @var bool $value
     */
    #[JsonProperty('value')]
    public bool $value;

    /**
     * @var ?string $reason
     */
    #[JsonProperty('reason')]
    public ?string $reason;

    /**
     * @param array{
     *   value: bool,
     *   reason?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->value = $values['value'];
        $this->reason = $values['reason'] ?? null;
    }
}
