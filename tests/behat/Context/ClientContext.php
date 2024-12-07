<?php

declare(strict_types=1);

namespace App\Tests\behat\Context;

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Symfony\Component\HttpClient\MockHttpClient;
use Symfony\Component\HttpClient\Response\MockResponse;
use Symfony\Contracts\HttpClient\HttpClientInterface;

readonly class ClientContext implements Context
{
    public function __construct(
        /** @var MockHttpClient */
        private HttpClientInterface $httpClient,
    ) {
    }

    /**
     * @Given the http-client will return response with status code :code and body:
     */
    public function setResponse(int $statusCode, PyStringNode $body): void
    {
        $response = new MockResponse($body->getRaw(), ['http_code' => $statusCode]);
        $this->httpClient->setResponseFactory($response);
    }
}
