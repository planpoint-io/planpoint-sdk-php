<?php

namespace Planpoint\Floors\Requests;

use Planpoint\Core\SerializableType;

class GetFloorsRequest extends SerializableType
{
    /**
     * @var string $pid
     */
    public string $pid;

    /**
     * @param array{
     *   pid: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->pid = $values['pid'];
    }
}
