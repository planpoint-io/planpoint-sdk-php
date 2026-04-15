<?php

namespace Planpoint\Types;

use Planpoint\Core\SerializableType;
use Planpoint\Core\JsonProperty;

class UnitFull extends SerializableType
{
    /**
     * @var string $id
     */
    #[JsonProperty('_id')]
    public string $id;

    /**
     * @var string $floor
     */
    #[JsonProperty('floor')]
    public string $floor;

    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?string $unitNumber
     */
    #[JsonProperty('unitNumber')]
    public ?string $unitNumber;

    /**
     * @var ?value-of<UnitFullStatus> $status
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?float $price
     */
    #[JsonProperty('price')]
    public ?float $price;

    /**
     * @var ?float $bed
     */
    #[JsonProperty('bed')]
    public ?float $bed;

    /**
     * @var ?float $bath
     */
    #[JsonProperty('bath')]
    public ?float $bath;

    /**
     * @var ?float $sqft
     */
    #[JsonProperty('sqft')]
    public ?float $sqft;

    /**
     * @var ?string $model
     */
    #[JsonProperty('model')]
    public ?string $model;

    /**
     * @var ?string $orientation
     */
    #[JsonProperty('orientation')]
    public ?string $orientation;

    /**
     * @var ?float $parking
     */
    #[JsonProperty('parking')]
    public ?float $parking;

    /**
     * @param array{
     *   id: string,
     *   floor: string,
     *   name?: ?string,
     *   unitNumber?: ?string,
     *   status?: ?value-of<UnitFullStatus>,
     *   price?: ?float,
     *   bed?: ?float,
     *   bath?: ?float,
     *   sqft?: ?float,
     *   model?: ?string,
     *   orientation?: ?string,
     *   parking?: ?float,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->floor = $values['floor'];
        $this->name = $values['name'] ?? null;
        $this->unitNumber = $values['unitNumber'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->price = $values['price'] ?? null;
        $this->bed = $values['bed'] ?? null;
        $this->bath = $values['bath'] ?? null;
        $this->sqft = $values['sqft'] ?? null;
        $this->model = $values['model'] ?? null;
        $this->orientation = $values['orientation'] ?? null;
        $this->parking = $values['parking'] ?? null;
    }
}
