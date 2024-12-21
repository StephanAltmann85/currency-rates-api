<?php

declare(strict_types=1);

namespace App\Client;

use App\Client\Request\RequestInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;

readonly class Client implements ClientInterface
{
    public function __construct(private HttpClientInterface $httpClient)
    {
    }

    public function request(RequestInterface $request): ResponseInterface
    {
        return $this->httpClient->request(
            $request->getMethod(),
            $request->getUrl(),
            [
                'headers' => $request->getHeaders(),
                'body' => $request->getBody(),
            ]
        );
    }
}
