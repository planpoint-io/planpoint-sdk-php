<?php

namespace Planpoint\Types;

use Planpoint\Core\Json\JsonSerializableType;
use Planpoint\Core\Json\JsonProperty;

/**
 * Translated string per language code
 */
class ProjectInternalUrLs extends JsonSerializableType
{
    /**
     * @var ?string $en
     */
    #[JsonProperty('en')]
    public ?string $en;

    /**
     * @var ?string $fr
     */
    #[JsonProperty('fr')]
    public ?string $fr;

    /**
     * @var ?string $de
     */
    #[JsonProperty('de')]
    public ?string $de;

    /**
     * @var ?string $es
     */
    #[JsonProperty('es')]
    public ?string $es;

    /**
     * @var ?string $zh
     */
    #[JsonProperty('zh')]
    public ?string $zh;

    /**
     * @param array{
     *   en?: ?string,
     *   fr?: ?string,
     *   de?: ?string,
     *   es?: ?string,
     *   zh?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->en = $values['en'] ?? null;
        $this->fr = $values['fr'] ?? null;
        $this->de = $values['de'] ?? null;
        $this->es = $values['es'] ?? null;
        $this->zh = $values['zh'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
