<?php

namespace Planpoint\Types;

use Planpoint\Core\SerializableType;
use Planpoint\Core\JsonProperty;

class CommercialSpace extends SerializableType
{
    /**
     * @var string $id
     */
    #[JsonProperty('_id')]
    public string $id;

    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?value-of<CommercialSpaceStatus> $status
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?float $price
     */
    #[JsonProperty('price')]
    public ?float $price;

    /**
     * @var ?float $sqft
     */
    #[JsonProperty('sqft')]
    public ?float $sqft;

    /**
     * @param array{
     *   id: string,
     *   name?: ?string,
     *   status?: ?value-of<CommercialSpaceStatus>,
     *   price?: ?float,
     *   sqft?: ?float,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->name = $values['name'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->price = $values['price'] ?? null;
        $this->sqft = $values['sqft'] ?? null;
    }
}
