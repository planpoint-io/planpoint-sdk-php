<?php

namespace Planpoint\Authentication\Requests;

use Planpoint\Core\SerializableType;
use Planpoint\Core\JsonProperty;

class LoginBody extends SerializableType
{
    /**
     * @var string $username
     */
    #[JsonProperty('username')]
    public string $username;

    /**
     * @var ?string $password
     */
    #[JsonProperty('password')]
    public ?string $password;

    /**
     * @var ?bool $impersonate
     */
    #[JsonProperty('impersonate')]
    public ?bool $impersonate;

    /**
     * @param array{
     *   username: string,
     *   password?: ?string,
     *   impersonate?: ?bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->username = $values['username'];
        $this->password = $values['password'] ?? null;
        $this->impersonate = $values['impersonate'] ?? null;
    }
}
