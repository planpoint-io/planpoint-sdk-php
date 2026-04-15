<?php

namespace Planpoint\Authentication;

use Planpoint\Core\RawClient;
use Planpoint\Authentication\Requests\LoginBody;
use Planpoint\Types\LoginResponse;
use Planpoint\Exceptions\PlanpointException;
use Planpoint\Exceptions\PlanpointApiException;
use Planpoint\Core\JsonApiRequest;
use Planpoint\Environments;
use Planpoint\Core\HttpMethod;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;

class AuthenticationClient
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
     * @param LoginBody $request
     * @param ?array{
     *   baseUrl?: string,
     * } $options
     * @return LoginResponse
     * @throws PlanpointException
     * @throws PlanpointApiException
     */
    public function login(LoginBody $request, ?array $options = null): LoginResponse
    {
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "api/users/login",
                    method: HttpMethod::POST,
                    body: $request,
                ),
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return LoginResponse::fromJson($json);
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
