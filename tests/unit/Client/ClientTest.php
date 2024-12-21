<?php

declare(strict_types=1);

namespace App\Tests\unit\Client;

use App\Client\Client;
use App\Client\ClientInterface;
use App\Client\Request\RequestInterface;
use Mockery\Adapter\Phpunit\MockeryTestCase;
use Mockery\MockInterface;
use PHPUnit\Framework\Attributes\CoversClass;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;

#[CoversClass(Client::class)]
class ClientTest extends MockeryTestCase
{
    private ClientInterface $client;

    /** @phpstan-var HttpClientInterface|MockInterface  */
    private HttpClientInterface $httpClient;

    public function setUp(): void
    {
        $this->httpClient = \Mockery::mock(HttpClientInterface::class);

        $this->client = new Client($this->httpClient);

        parent::setUp();
    }

    /**
     * @throws TransportExceptionInterface
     */
    public function testRequest(): void
    {
        $request = \Mockery::mock(RequestInterface::class);
        $response = \Mockery::mock(ResponseInterface::class);

        $request
            ->shouldReceive('getMethod')
            ->once()
            ->andReturn('GET');

        $request
            ->shouldReceive('getUrl')
            ->once()
            ->andReturn('url');

        $request
            ->shouldReceive('getHeaders')
            ->once()
            ->andReturn(['foo' => 'bar']);

        $request
            ->shouldReceive('getBody')
            ->once()
            ->andReturn('{}');

        $this->httpClient
            ->shouldReceive('request')
            ->once()
            ->with('GET', 'url', ['headers' => ['foo' => 'bar'], 'body' => '{}'])
            ->andReturn($response);

        $result = $this->client->request($request);

        $this->assertSame($response, $result);
    }
}
