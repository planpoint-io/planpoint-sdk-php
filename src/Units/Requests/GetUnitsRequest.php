<?php

namespace Planpoint\Units\Requests;

use Planpoint\Core\Json\JsonSerializableType;

class GetUnitsRequest extends JsonSerializableType
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
