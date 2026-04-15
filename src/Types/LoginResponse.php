<?php

namespace Planpoint\Types;

use Planpoint\Core\SerializableType;
use Planpoint\Core\JsonProperty;

class LoginResponse extends SerializableType
{
    /**
     * @var string $message
     */
    #[JsonProperty('message')]
    public string $message;

    /**
     * @var string $accessToken
     */
    #[JsonProperty('access_token')]
    public string $accessToken;

    /**
     * @param array{
     *   message: string,
     *   accessToken: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->message = $values['message'];
        $this->accessToken = $values['accessToken'];
    }
}
