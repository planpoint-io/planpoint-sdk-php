<?php

namespace Planpoint\Units\Requests;

use Planpoint\Core\Json\JsonSerializableType;
use Planpoint\Core\Json\JsonProperty;
use Planpoint\Core\Types\ArrayType;

class BatchUpdateUnitsBody extends JsonSerializableType
{
    /**
     * @var array<string> $ids
     */
    #[JsonProperty('ids'), ArrayType(['string'])]
    public array $ids;

    /**
     * @var array<string, mixed> $patchData
     */
    #[JsonProperty('patchData'), ArrayType(['string' => 'mixed'])]
    public array $patchData;

    /**
     * @param array{
     *   ids: array<string>,
     *   patchData: array<string, mixed>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->ids = $values['ids'];
        $this->patchData = $values['patchData'];
    }
}
