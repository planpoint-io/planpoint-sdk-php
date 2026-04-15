<?php

namespace Planpoint\Units\Requests;

use Planpoint\Core\SerializableType;
use Planpoint\Units\Types\CreateUnitBodyFloor;
use Planpoint\Core\JsonProperty;

class CreateUnitBody extends SerializableType
{
    /**
     * @var CreateUnitBodyFloor $floor
     */
    #[JsonProperty('floor')]
    public CreateUnitBodyFloor $floor;

    /**
     * @param array{
     *   floor: CreateUnitBodyFloor,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->floor = $values['floor'];
    }
}
