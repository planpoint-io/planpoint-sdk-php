<?php

namespace Planpoint;

use Planpoint\Authentication\AuthenticationClient;
use Planpoint\Projects\ProjectsClient;
use Planpoint\Groups\GroupsClient;
use Planpoint\Floors\FloorsClient;
use Planpoint\Units\UnitsClient;
use Planpoint\Leads\LeadsClient;
use GuzzleHttp\ClientInterface;
use Planpoint\Core\Client\RawClient;

class PlanpointClient
{
    /**
     * @var AuthenticationClient $authentication
     */
    public AuthenticationClient $authentication;

    /**
     * @var ProjectsClient $projects
     */
    public ProjectsClient $projects;

    /**
     * @var GroupsClient $groups
     */
    public GroupsClient $groups;

    /**
     * @var FloorsClient $floors
     */
    public FloorsClient $floors;

    /**
     * @var UnitsClient $units
     */
    public UnitsClient $units;

    /**
     * @var LeadsClient $leads
     */
    public LeadsClient $leads;

    /**
     * @var array{
     *   baseUrl?: string,
     *   client?: ClientInterface,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     * } $options
     */
    private array $options;

    /**
     * @var RawClient $client
     */
    private RawClient $client;

    /**
     * @param ?string $token The token to use for authentication.
     * @param ?array{
     *   baseUrl?: string,
     *   client?: ClientInterface,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     * } $options
     */
    public function __construct(
        ?string $token = null,
        ?array $options = null,
    ) {
        $defaultHeaders = [
            'X-Fern-Language' => 'PHP',
            'X-Fern-SDK-Name' => 'Planpoint',
            'X-Fern-SDK-Version' => '0.0.43',
            'User-Agent' => 'planpoint/planpoint/0.0.43',
        ];
        if ($token != null) {
            $defaultHeaders['Authorization'] = "Bearer $token";
        }

        $this->options = $options ?? [];
        $this->options['headers'] = array_merge(
            $defaultHeaders,
            $this->options['headers'] ?? [],
        );

        $this->client = new RawClient(
            options: $this->options,
        );

        $this->authentication = new AuthenticationClient($this->client, $this->options);
        $this->projects = new ProjectsClient($this->client, $this->options);
        $this->groups = new GroupsClient($this->client, $this->options);
        $this->floors = new FloorsClient($this->client, $this->options);
        $this->units = new UnitsClient($this->client, $this->options);
        $this->leads = new LeadsClient($this->client, $this->options);
    }
}
