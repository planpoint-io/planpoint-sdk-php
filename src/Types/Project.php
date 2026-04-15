<?php

namespace Planpoint\Types;

use Planpoint\Core\Json\JsonSerializableType;
use Planpoint\Core\Json\JsonProperty;
use Planpoint\Core\Types\ArrayType;

class Project extends JsonSerializableType
{
    /**
     * @var string $id
     */
    #[JsonProperty('_id')]
    public string $id;

    /**
     * @var string $name
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var string $namespace
     */
    #[JsonProperty('namespace')]
    public string $namespace;

    /**
     * @var string $hostName
     */
    #[JsonProperty('hostName')]
    public string $hostName;

    /**
     * @var ?array<Floor> $floors
     */
    #[JsonProperty('floors'), ArrayType([Floor::class])]
    public ?array $floors;

    /**
     * @var ?array<CommercialSpace> $commercialSpaces
     */
    #[JsonProperty('commercialSpaces'), ArrayType([CommercialSpace::class])]
    public ?array $commercialSpaces;

    /**
     * @var ?array<Collection> $collections
     */
    #[JsonProperty('collections'), ArrayType([Collection::class])]
    public ?array $collections;

    /**
     * @var ?string $projectLang
     */
    #[JsonProperty('projectLang')]
    public ?string $projectLang;

    /**
     * @var ?string $styleNavigation
     */
    #[JsonProperty('styleNavigation')]
    public ?string $styleNavigation;

    /**
     * @var ?bool $showPrices
     */
    #[JsonProperty('showPrices')]
    public ?bool $showPrices;

    /**
     * @var ?bool $showAvailability
     */
    #[JsonProperty('showAvailability')]
    public ?bool $showAvailability;

    /**
     * @var ?bool $showBathrooms
     */
    #[JsonProperty('showBathrooms')]
    public ?bool $showBathrooms;

    /**
     * @var ?bool $showParking
     */
    #[JsonProperty('showParking')]
    public ?bool $showParking;

    /**
     * @var ?bool $showOrientation
     */
    #[JsonProperty('showOrientation')]
    public ?bool $showOrientation;

    /**
     * @var ?bool $hideSold
     */
    #[JsonProperty('hideSold')]
    public ?bool $hideSold;

    /**
     * @var ?string $initialView
     */
    #[JsonProperty('initialView')]
    public ?string $initialView;

    /**
     * @var ?string $logo
     */
    #[JsonProperty('logo')]
    public ?string $logo;

    /**
     * @var ?string $coverImage
     */
    #[JsonProperty('coverImage')]
    public ?string $coverImage;

    /**
     * @var ?string $colorBase
     */
    #[JsonProperty('colorBase')]
    public ?string $colorBase;

    /**
     * @var ?string $colorAccent
     */
    #[JsonProperty('colorAccent')]
    public ?string $colorAccent;

    /**
     * @var ?string $colorButton
     */
    #[JsonProperty('colorButton')]
    public ?string $colorButton;

    /**
     * @var ?string $colorAvailable
     */
    #[JsonProperty('colorAvailable')]
    public ?string $colorAvailable;

    /**
     * @var ?string $colorSold
     */
    #[JsonProperty('colorSold')]
    public ?string $colorSold;

    /**
     * @var ?string $colorReserved
     */
    #[JsonProperty('colorReserved')]
    public ?string $colorReserved;

    /**
     * @var ?ProjectCustomButtonTxt $customButtonTxt Translated string per language code
     */
    #[JsonProperty('customButtonTxt')]
    public ?ProjectCustomButtonTxt $customButtonTxt;

    /**
     * @var ?ProjectInternalUrLs $internalUrLs Translated string per language code
     */
    #[JsonProperty('internalURLs')]
    public ?ProjectInternalUrLs $internalUrLs;

    /**
     * @var ?string $websiteUrl
     */
    #[JsonProperty('websiteURL')]
    public ?string $websiteUrl;

    /**
     * @var ?string $customDomain
     */
    #[JsonProperty('customDomain')]
    public ?string $customDomain;

    /**
     * @var ?bool $sharePageEnabled
     */
    #[JsonProperty('sharePageEnabled')]
    public ?bool $sharePageEnabled;

    /**
     * @param array{
     *   id: string,
     *   name: string,
     *   namespace: string,
     *   hostName: string,
     *   floors?: ?array<Floor>,
     *   commercialSpaces?: ?array<CommercialSpace>,
     *   collections?: ?array<Collection>,
     *   projectLang?: ?string,
     *   styleNavigation?: ?string,
     *   showPrices?: ?bool,
     *   showAvailability?: ?bool,
     *   showBathrooms?: ?bool,
     *   showParking?: ?bool,
     *   showOrientation?: ?bool,
     *   hideSold?: ?bool,
     *   initialView?: ?string,
     *   logo?: ?string,
     *   coverImage?: ?string,
     *   colorBase?: ?string,
     *   colorAccent?: ?string,
     *   colorButton?: ?string,
     *   colorAvailable?: ?string,
     *   colorSold?: ?string,
     *   colorReserved?: ?string,
     *   customButtonTxt?: ?ProjectCustomButtonTxt,
     *   internalUrLs?: ?ProjectInternalUrLs,
     *   websiteUrl?: ?string,
     *   customDomain?: ?string,
     *   sharePageEnabled?: ?bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->name = $values['name'];
        $this->namespace = $values['namespace'];
        $this->hostName = $values['hostName'];
        $this->floors = $values['floors'] ?? null;
        $this->commercialSpaces = $values['commercialSpaces'] ?? null;
        $this->collections = $values['collections'] ?? null;
        $this->projectLang = $values['projectLang'] ?? null;
        $this->styleNavigation = $values['styleNavigation'] ?? null;
        $this->showPrices = $values['showPrices'] ?? null;
        $this->showAvailability = $values['showAvailability'] ?? null;
        $this->showBathrooms = $values['showBathrooms'] ?? null;
        $this->showParking = $values['showParking'] ?? null;
        $this->showOrientation = $values['showOrientation'] ?? null;
        $this->hideSold = $values['hideSold'] ?? null;
        $this->initialView = $values['initialView'] ?? null;
        $this->logo = $values['logo'] ?? null;
        $this->coverImage = $values['coverImage'] ?? null;
        $this->colorBase = $values['colorBase'] ?? null;
        $this->colorAccent = $values['colorAccent'] ?? null;
        $this->colorButton = $values['colorButton'] ?? null;
        $this->colorAvailable = $values['colorAvailable'] ?? null;
        $this->colorSold = $values['colorSold'] ?? null;
        $this->colorReserved = $values['colorReserved'] ?? null;
        $this->customButtonTxt = $values['customButtonTxt'] ?? null;
        $this->internalUrLs = $values['internalUrLs'] ?? null;
        $this->websiteUrl = $values['websiteUrl'] ?? null;
        $this->customDomain = $values['customDomain'] ?? null;
        $this->sharePageEnabled = $values['sharePageEnabled'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
