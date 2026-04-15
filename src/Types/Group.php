<?php

namespace Planpoint\Types;

use Planpoint\Core\Json\JsonSerializableType;
use Planpoint\Core\Json\JsonProperty;
use Planpoint\Core\Types\ArrayType;
use Planpoint\Core\Types\Union;

class Group extends JsonSerializableType
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
     * @var ?string $namespace
     */
    #[JsonProperty('namespace')]
    public ?string $namespace;

    /**
     * @var ?string $hostName
     */
    #[JsonProperty('hostName')]
    public ?string $hostName;

    /**
     * @var ?string $type
     */
    #[JsonProperty('type')]
    public ?string $type;

    /**
     * @var ?string $propertyType
     */
    #[JsonProperty('propertyType')]
    public ?string $propertyType;

    /**
     * @var string $user
     */
    #[JsonProperty('user')]
    public string $user;

    /**
     * @var ?array<(
     *    GroupProject
     *   |string
     * )> $projects
     */
    #[JsonProperty('projects'), ArrayType([new Union(GroupProject::class, 'string')])]
    public ?array $projects;

    /**
     * @var ?bool $isOwner
     */
    #[JsonProperty('isOwner')]
    public ?bool $isOwner;

    /**
     * @var ?bool $isAdmin
     */
    #[JsonProperty('isAdmin')]
    public ?bool $isAdmin;

    /**
     * @var ?bool $isEditor
     */
    #[JsonProperty('isEditor')]
    public ?bool $isEditor;

    /**
     * @param array{
     *   id: string,
     *   user: string,
     *   name?: ?string,
     *   namespace?: ?string,
     *   hostName?: ?string,
     *   type?: ?string,
     *   propertyType?: ?string,
     *   projects?: ?array<(
     *    GroupProject
     *   |string
     * )>,
     *   isOwner?: ?bool,
     *   isAdmin?: ?bool,
     *   isEditor?: ?bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->name = $values['name'] ?? null;
        $this->namespace = $values['namespace'] ?? null;
        $this->hostName = $values['hostName'] ?? null;
        $this->type = $values['type'] ?? null;
        $this->propertyType = $values['propertyType'] ?? null;
        $this->user = $values['user'];
        $this->projects = $values['projects'] ?? null;
        $this->isOwner = $values['isOwner'] ?? null;
        $this->isAdmin = $values['isAdmin'] ?? null;
        $this->isEditor = $values['isEditor'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
