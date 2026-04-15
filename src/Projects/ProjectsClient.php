<?php

namespace Planpoint\Projects;

use Planpoint\Core\RawClient;
use Planpoint\Projects\Requests\FindProjectBody;
use Planpoint\Types\Project;
use Planpoint\Exceptions\PlanpointException;
use Planpoint\Exceptions\PlanpointApiException;
use Planpoint\Core\JsonApiRequest;
use Planpoint\Environments;
use Planpoint\Core\HttpMethod;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use Planpoint\Types\ProjectSummary;
use Planpoint\Core\JsonDecoder;
use Planpoint\Core\JsonSerializer;

class ProjectsClient
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
     * Returns the full project document including floors, units, commercial spaces, and collections.
     *
     * @param FindProjectBody $request
     * @param ?array{
     *   baseUrl?: string,
     * } $options
     * @return Project
     * @throws PlanpointException
     * @throws PlanpointApiException
     */
    public function findProject(FindProjectBody $request, ?array $options = null): Project
    {
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "api/projects/find",
                    method: HttpMethod::POST,
                    body: $request,
                ),
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return Project::fromJson($json);
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
     * @param ?array{
     *   baseUrl?: string,
     * } $options
     * @return array<ProjectSummary>
     * @throws PlanpointException
     * @throws PlanpointApiException
     */
    public function getMyProjects(?array $options = null): array
    {
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "api/projects/mine",
                    method: HttpMethod::GET,
                ),
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return JsonDecoder::decodeArray($json, [ProjectSummary::class]); // @phpstan-ignore-line
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
     * @return Project
     * @throws PlanpointException
     * @throws PlanpointApiException
     */
    public function getProject(string $id, ?array $options = null): Project
    {
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "api/projects/$id",
                    method: HttpMethod::GET,
                ),
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return Project::fromJson($json);
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
     * @return Project
     * @throws PlanpointException
     * @throws PlanpointApiException
     */
    public function updateProject(string $id, array $request, ?array $options = null): Project
    {
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "api/projects/$id",
                    method: HttpMethod::PATCH,
                    body: JsonSerializer::serializeArray($request, ['string' => 'mixed']),
                ),
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return Project::fromJson($json);
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
