<?php

namespace Planpoint\Types;

use Planpoint\Core\Json\JsonSerializableType;
use Planpoint\Core\Json\JsonProperty;
use Planpoint\Core\Types\ArrayType;

class Unit extends JsonSerializableType
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
     * @var ?string $unitNumber
     */
    #[JsonProperty('unitNumber')]
    public ?string $unitNumber;

    /**
     * @var ?value-of<UnitStatus> $status
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
     * @var ?string $floor
     */
    #[JsonProperty('floor')]
    public ?string $floor;

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
     * @var ?array<UnitModel> $unitmodels
     */
    #[JsonProperty('unitmodels'), ArrayType([UnitModel::class])]
    public ?array $unitmodels;

    /**
     * @param array{
     *   id: string,
     *   name?: ?string,
     *   unitNumber?: ?string,
     *   status?: ?value-of<UnitStatus>,
     *   price?: ?float,
     *   bed?: ?float,
     *   bath?: ?float,
     *   sqft?: ?float,
     *   model?: ?string,
     *   floor?: ?string,
     *   orientation?: ?string,
     *   parking?: ?float,
     *   unitmodels?: ?array<UnitModel>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->name = $values['name'] ?? null;
        $this->unitNumber = $values['unitNumber'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->price = $values['price'] ?? null;
        $this->bed = $values['bed'] ?? null;
        $this->bath = $values['bath'] ?? null;
        $this->sqft = $values['sqft'] ?? null;
        $this->model = $values['model'] ?? null;
        $this->floor = $values['floor'] ?? null;
        $this->orientation = $values['orientation'] ?? null;
        $this->parking = $values['parking'] ?? null;
        $this->unitmodels = $values['unitmodels'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
