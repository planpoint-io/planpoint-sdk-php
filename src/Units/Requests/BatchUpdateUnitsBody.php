<?php

namespace Planpoint\Units\Requests;

use Planpoint\Core\SerializableType;
use Planpoint\Core\JsonProperty;
use Planpoint\Core\ArrayType;

class BatchUpdateUnitsBody extends SerializableType
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
