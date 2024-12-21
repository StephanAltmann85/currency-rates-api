<?php

declare(strict_types=1);

namespace App\Tests\integration\Collector\Currency\Channel\Ecb\Response;

use App\Collector\Currency\Channel\Ecb\Response\Dto\CurrencyRate;
use App\Collector\Currency\Channel\Ecb\Response\GetRatesResponse;
use App\Collector\Currency\Response\CurrencyRateInterface;
use League\Flysystem\FilesystemException;
use League\Flysystem\FilesystemOperator;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\UsesClass;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Serializer\SerializerInterface;

#[CoversClass(GetRatesResponse::class)]
#[UsesClass(CurrencyRate::class)]
class GetRatesResponseTest extends KernelTestCase
{
    private SerializerInterface $serializer;

    private FilesystemOperator $testDataStorage;

    public function setUp(): void
    {
        self::bootKernel();
        $container = static::getContainer();

        /** @var SerializerInterface $serializer */
        $serializer = $container->get(SerializerInterface::class);

        /** @var FilesystemOperator $testDataStorage */
        $testDataStorage = $container->get('test.storage');

        $this->serializer = $serializer;
        $this->testDataStorage = $testDataStorage;

        parent::setUp();
    }

    /**
     * @throws FilesystemException
     */
    public function testDeserialization(): void
    {
        $content = $this->testDataStorage->read('Responses/eurofxref-daily.xml');

        $result = $this->serializer->deserialize($content, GetRatesResponse::class, 'xml');

        $this->assertInstanceOf(GetRatesResponse::class, $result);
        $this->assertContainsOnlyInstancesOf(CurrencyRateInterface::class, $result->getCurrencyRates());
        $this->assertCount(31, $result->getCurrencyRates());
        $this->assertEquals(new \DateTime('2024-01-04'), $result->getTime());
    }
}
