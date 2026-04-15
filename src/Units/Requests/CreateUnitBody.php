<?php

namespace Planpoint\Units\Requests;

use Planpoint\Core\Json\JsonSerializableType;
use Planpoint\Units\Types\CreateUnitBodyFloor;
use Planpoint\Core\Json\JsonProperty;

class CreateUnitBody extends JsonSerializableType
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
