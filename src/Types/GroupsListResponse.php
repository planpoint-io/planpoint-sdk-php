<?php

namespace Planpoint\Types;

use Planpoint\Core\SerializableType;
use Planpoint\Core\JsonProperty;
use Planpoint\Core\ArrayType;

class GroupsListResponse extends SerializableType
{
    /**
     * @var array<Group> $records
     */
    #[JsonProperty('records'), ArrayType([Group::class])]
    public array $records;

    /**
     * @var float $count
     */
    #[JsonProperty('count')]
    public float $count;

    /**
     * @param array{
     *   records: array<Group>,
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
