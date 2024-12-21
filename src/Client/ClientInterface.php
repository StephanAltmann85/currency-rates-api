<?php

declare(strict_types=1);

namespace App\Client;

use App\Client\Request\RequestInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;

interface ClientInterface
{
    /**
     * @throws TransportExceptionInterface
     */
    public function request(RequestInterface $request): ResponseInterface;
}
