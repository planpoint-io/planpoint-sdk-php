<?php

namespace Planpoint\Groups;

use Planpoint\Core\RawClient;
use Planpoint\Types\GroupsListResponse;
use Planpoint\Exceptions\PlanpointException;
use Planpoint\Exceptions\PlanpointApiException;
use Planpoint\Core\JsonApiRequest;
use Planpoint\Environments;
use Planpoint\Core\HttpMethod;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use Planpoint\Groups\Requests\CreateGroupBody;
use Planpoint\Types\Group;
use Planpoint\Core\JsonSerializer;

class GroupsClient
{
    /**
     * @var RawClient $client
     */
    private RawClient $client;

    /**
     * @param RawClient $client
     */
    public function __construct(
        RawClient $client,
    ) {
        $this->client = $client;
    }

    /**
     * @param ?array{
     *   baseUrl?: string,
     * } $options
     * @return GroupsListResponse
     * @throws PlanpointException
     * @throws PlanpointApiException
     */
    public function getGroups(?array $options = null): GroupsListResponse
    {
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "api/groups",
                    method: HttpMethod::GET,
                ),
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return GroupsListResponse::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new PlanpointException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (ClientExceptionInterface $e) {
            throw new PlanpointException(message: $e->getMessage(), previous: $e);
        }
        throw new PlanpointApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * @param CreateGroupBody $request
     * @param ?array{
     *   baseUrl?: string,
     * } $options
     * @return Group
     * @throws PlanpointException
     * @throws PlanpointApiException
     */
    public function createGroup(CreateGroupBody $request, ?array $options = null): Group
    {
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "api/groups",
                    method: HttpMethod::POST,
                    body: $request,
                ),
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return Group::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new PlanpointException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (ClientExceptionInterface $e) {
            throw new PlanpointException(message: $e->getMessage(), previous: $e);
        }
        throw new PlanpointApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * @param string $id
     * @param ?array{
     *   baseUrl?: string,
     * } $options
     * @return Group
     * @throws PlanpointException
     * @throws PlanpointApiException
     */
    public function getGroup(string $id, ?array $options = null): Group
    {
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "api/groups/$id",
                    method: HttpMethod::GET,
                ),
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return Group::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new PlanpointException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (ClientExceptionInterface $e) {
            throw new PlanpointException(message: $e->getMessage(), previous: $e);
        }
        throw new PlanpointApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * @param string $id
     * @param array<string, mixed> $request
     * @param ?array{
     *   baseUrl?: string,
     * } $options
     * @return Group
     * @throws PlanpointException
     * @throws PlanpointApiException
     */
    public function updateGroup(string $id, array $request, ?array $options = null): Group
    {
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "api/groups/$id",
                    method: HttpMethod::PATCH,
                    body: JsonSerializer::serializeArray($request, ['string' => 'mixed']),
                ),
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return Group::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new PlanpointException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (ClientExceptionInterface $e) {
            throw new PlanpointException(message: $e->getMessage(), previous: $e);
        }
        throw new PlanpointApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }
}
