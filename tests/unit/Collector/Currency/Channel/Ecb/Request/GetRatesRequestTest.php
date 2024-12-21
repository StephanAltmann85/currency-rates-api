<?php

declare(strict_types=1);

namespace App\Tests\unit\Collector\Currency\Channel\Ecb\Request;

use App\Collector\Currency\Channel\Ecb\Request\GetRatesRequest;
use App\Collector\Currency\Channel\Ecb\Response\GetRatesResponse;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(GetRatesRequest::class)]
class GetRatesRequestTest extends TestCase
{
    public function testInstantiation(): void
    {
        $request = new GetRatesRequest();

        $this->assertEquals('https://www.ecb.europa.eu/stats/eurofxref/eurofxref-daily.xml', $request->getUrl());
        $this->assertEquals('GET', $request->getMethod());
        $this->assertEquals('', $request->getBody());
        $this->assertEquals([], $request->getHeaders());
        $this->assertEquals(GetRatesResponse::class, $request->getResponseClass());
    }
}
