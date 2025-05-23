<?php

declare(strict_types=1);

namespace App\Tests\integration\EventListener;

use App\Entity\Currency;
use App\Entity\CurrencyRateHistory;
use App\EventListener\CurrencyUpdateEventListener;
use App\Tests\Helper\Factory\CurrencyFactory;
use App\Tests\Helper\Factory\CurrencyRateHistoryFactory;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Exception\ORMException;
use PHPUnit\Framework\Attributes\CoversClass;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Uid\Uuid;
use Zenstruck\Foundry\Test\Factories;
use Zenstruck\Foundry\Test\ResetDatabase;

#[CoversClass(CurrencyUpdateEventListener::class)]
#[CoversClass(Currency::class)]
#[CoversClass(CurrencyRateHistory::class)]
class CurrencyRateUpdateEventListenerTest extends KernelTestCase
{
    use ResetDatabase;
    use Factories;

    private EntityManagerInterface $entityManager;

    public function setUp(): void
    {
        self::bootKernel();
        $container = static::getContainer();

        /** @var EntityManagerInterface $entityManager */
        $entityManager = $container->get(EntityManagerInterface::class);

        $this->entityManager = $entityManager;

        parent::setUp();
    }

    /**
     * @throws ORMException
     */
    public function testPersistCurrencyWithoutRateChangeWontAddRateHistory(): void
    {
        $currency1 = CurrencyFactory::createOne(['iso3' => 'TS1'])->_real();

        $currency1->setUpdatedAt(new \DateTime());
        $this->entityManager->persist($currency1);
        $this->entityManager->flush();
        $this->entityManager->refresh($currency1);

        $this->assertEmpty($currency1->getHistory());
    }

    /**
     * @throws ORMException
     */
    public function testPersistCurrencyWithRateChange(): void
    {
        $currency1 = CurrencyFactory::createOne(['iso3' => 'TS1', 'rate' => 1])->_real();

        $currency1->setRate(2);
        $this->entityManager->persist($currency1);
        $this->entityManager->flush();
        $this->entityManager->refresh($currency1);

        $this->assertNotEmpty($currency1->getHistory());
    }

    /**
     * @throws ORMException
     */
    public function testPersistCurrencyWithManuallyAddedHistory(): void
    {
        $currency1 = CurrencyFactory::createOne(['iso3' => 'TS1'])->_real();

        $currencyRateHistory = (new CurrencyRateHistory())
            ->setRate(0.9)
            ->setDate(new \DateTime());

        $currency1->addHistory($currencyRateHistory);
        $this->entityManager->persist($currency1);
        $this->entityManager->flush();
        $this->entityManager->refresh($currency1);

        $this->assertCount(1, $currency1->getHistory());
        $this->assertEquals(0.9, $currencyRateHistory->getRate());
        $this->assertTrue(Uuid::isValid((string) $currencyRateHistory->getId()));
    }

    public function testPersistingCurrencyRateHistory(): void
    {
        $currencyRateHistory = CurrencyRateHistoryFactory::createOne()->_real();

        $this->entityManager->persist($currencyRateHistory->setRate(2));
        $this->entityManager->flush();

        /** @var Currency $currency */
        $currency = $currencyRateHistory->getCurrency();

        $this->assertCount(1, $currency->getHistory());
        $this->assertTrue(Uuid::isValid((string) $currencyRateHistory->getId()));
    }
}
