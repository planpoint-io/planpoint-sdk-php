<?php

namespace Planpoint\Leads\Requests;

use Planpoint\Core\SerializableType;

class GetLeadsRequest extends SerializableType
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
