<?php

declare(strict_types=1);

namespace App\Collector\Currency\Channel\Ecb\Request;

use App\Client\Request\RequestInterface;
use App\Collector\Currency\Channel\Ecb\Response\GetRatesResponse;
use Symfony\Component\HttpFoundation\Request;

class GetRatesRequest implements RequestInterface
{
    public function getUrl(): string
    {
        return 'https://www.ecb.europa.eu/stats/eurofxref/eurofxref-daily.xml';
    }

    public function getMethod(): string
    {
        return Request::METHOD_GET;
    }

    public function getBody(): string
    {
        return '';
    }

    public function getHeaders(): array
    {
        return [];
    }

    public function getResponseClass(): string
    {
        return GetRatesResponse::class;
    }
}
