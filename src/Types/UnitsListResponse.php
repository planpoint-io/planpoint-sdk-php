<?php

namespace Planpoint\Types;

use Planpoint\Core\SerializableType;
use Planpoint\Core\JsonProperty;
use Planpoint\Core\ArrayType;

class UnitsListResponse extends SerializableType
{
    /**
     * @var array<UnitFull> $records
     */
    #[JsonProperty('records'), ArrayType([UnitFull::class])]
    public array $records;

    /**
     * @var float $count
     */
    #[JsonProperty('count')]
    public float $count;

    /**
     * @param array{
     *   records: array<UnitFull>,
     *   count: float,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->records = $values['records'];
        $this->count = $values['count'];
    }
}
