<?php

namespace Planpoint\Leads;

use Planpoint\Core\RawClient;
use Planpoint\Leads\Requests\GetLeadsRequest;
use Planpoint\Types\Lead;
use Planpoint\Exceptions\PlanpointException;
use Planpoint\Exceptions\PlanpointApiException;
use Planpoint\Core\JsonApiRequest;
use Planpoint\Environments;
use Planpoint\Core\HttpMethod;
use Planpoint\Core\JsonDecoder;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;

class LeadsClient
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
     * @param GetLeadsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     * } $options
     * @return array<Lead>
     * @throws PlanpointException
     * @throws PlanpointApiException
     */
    public function getLeads(GetLeadsRequest $request, ?array $options = null): array
    {
        $query = [];
        $query['pid'] = $request->pid;
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "api/leads",
                    method: HttpMethod::GET,
                    query: $query,
                ),
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return JsonDecoder::decodeArray($json, [Lead::class]); // @phpstan-ignore-line
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
