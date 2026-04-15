<?php

namespace Planpoint\Floors;

use Planpoint\Core\RawClient;
use Planpoint\Floors\Requests\GetFloorsRequest;
use Planpoint\Types\FloorFull;
use Planpoint\Exceptions\PlanpointException;
use Planpoint\Exceptions\PlanpointApiException;
use Planpoint\Core\JsonApiRequest;
use Planpoint\Environments;
use Planpoint\Core\HttpMethod;
use Planpoint\Core\JsonDecoder;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use Planpoint\Floors\Requests\CreateFloorBody;
use Planpoint\Core\JsonSerializer;

class FloorsClient
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
     * @param GetFloorsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     * } $options
     * @return array<FloorFull>
     * @throws PlanpointException
     * @throws PlanpointApiException
     */
    public function getFloors(GetFloorsRequest $request, ?array $options = null): array
    {
        $query = [];
        $query['pid'] = $request->pid;
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "api/floors",
                    method: HttpMethod::GET,
                    query: $query,
                ),
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return JsonDecoder::decodeArray($json, [FloorFull::class]); // @phpstan-ignore-line
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
     * @param CreateFloorBody $request
     * @param ?array{
     *   baseUrl?: string,
     * } $options
     * @return FloorFull
     * @throws PlanpointException
     * @throws PlanpointApiException
     */
    public function createFloor(CreateFloorBody $request, ?array $options = null): FloorFull
    {
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "api/floors",
                    method: HttpMethod::POST,
                    body: $request,
                ),
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return FloorFull::fromJson($json);
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
     * @return FloorFull
     * @throws PlanpointException
     * @throws PlanpointApiException
     */
    public function getFloor(string $id, ?array $options = null): FloorFull
    {
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "api/floors/$id",
                    method: HttpMethod::GET,
                ),
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return FloorFull::fromJson($json);
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
     * @return FloorFull
     * @throws PlanpointException
     * @throws PlanpointApiException
     */
    public function updateFloor(string $id, array $request, ?array $options = null): FloorFull
    {
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "api/floors/$id",
                    method: HttpMethod::PATCH,
                    body: JsonSerializer::serializeArray($request, ['string' => 'mixed']),
                ),
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return FloorFull::fromJson($json);
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
