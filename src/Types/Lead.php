<?php

namespace Planpoint\Types;

use Planpoint\Core\Json\JsonSerializableType;
use Planpoint\Core\Json\JsonProperty;

class Lead extends JsonSerializableType
{
    /**
     * @var ?string $id
     */
    #[JsonProperty('_id')]
    public ?string $id;

    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?string $email
     */
    #[JsonProperty('email')]
    public ?string $email;

    /**
     * @var ?string $phone
     */
    #[JsonProperty('phone')]
    public ?string $phone;

    /**
     * @var ?string $message
     */
    #[JsonProperty('message')]
    public ?string $message;

    /**
     * @var ?string $unit
     */
    #[JsonProperty('unit')]
    public ?string $unit;

    /**
     * @var ?string $createdAt
     */
    #[JsonProperty('createdAt')]
    public ?string $createdAt;

    /**
     * @param array{
     *   id?: ?string,
     *   name?: ?string,
     *   email?: ?string,
     *   phone?: ?string,
     *   message?: ?string,
     *   unit?: ?string,
     *   createdAt?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->id = $values['id'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->email = $values['email'] ?? null;
        $this->phone = $values['phone'] ?? null;
        $this->message = $values['message'] ?? null;
        $this->unit = $values['unit'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
