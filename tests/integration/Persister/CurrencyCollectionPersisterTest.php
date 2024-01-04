<?php

declare(strict_types=1);

namespace App\Tests\integration\Persister;

use App\Entity\Currency;
use App\Entity\CurrencyRateHistory;
use App\Persister\CollectionPersister;
use App\Persister\CurrencyCollectionPersister;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class CurrencyCollectionPersisterTest extends KernelTestCase
{
    private CollectionPersister $persister;

    private EntityManagerInterface $entityManager;

    public function setUp(): void
    {
        self::bootKernel();
        $container = static::getContainer();

        /** @var CollectionPersister $persister */
        $persister = $container->get(CurrencyCollectionPersister::class);
        /** @var EntityManagerInterface $entityManager */
        $entityManager = $container->get(EntityManagerInterface::class);

        $this->persister = $persister;
        $this->entityManager = $entityManager;

        parent::setUp();
    }

    public function testPersist(): void
    {
        $this->createTestCurrencies();

        /** @phpstan-var Currency $currency1 */
        $currency1 = $this->entityManager->find(Currency::class, 'TS1');
        /** @phpstan-var Currency $currency2 */
        $currency2 = $this->entityManager->find(Currency::class, 'TS2');

        $currency3 = (new Currency('TS3'))
            ->setRate(1)
            ->setUpdatedAt(new \DateTime('2001-01-01'));

        $currency2->setRate(2);

        $currencies = new ArrayCollection([$currency1, $currency2, $currency3]);

        $this->persister->persist($currencies);

        $this->entityManager->refresh($currency1);

        $this->entityManager->refresh($currency2);
        $this->entityManager->refresh($currency3);

        $this->assertEquals('2000-01-01', $currency1->getUpdatedAt()->format('Y-m-d'));
        $this->assertEmpty($currency1->getHistory());

        /** @phpstan-var CurrencyRateHistory $currency2RateHistory */
        $currency2RateHistory = $currency2->getHistory()->last();
        /** @var \DateTime $currency2RateHistoryDate */
        $currency2RateHistoryDate = $currency2RateHistory->getDate();

        $this->assertEquals('2000-01-01', $currency2RateHistoryDate->format('Y-m-d'));
        $this->assertNotEmpty($currency2->getHistory());

        $this->assertEquals('2001-01-01', $currency3->getUpdatedAt()->format('Y-m-d'));
        $this->assertEmpty($currency3->getHistory());
    }

    private function createTestCurrencies(): void
    {
        $currency1 = $this->entityManager->find(Currency::class, 'TS1');
        $currency2 = $this->entityManager->find(Currency::class, 'TS2');
        $currency3 = $this->entityManager->find(Currency::class, 'TS3');

        if (null !== $currency1) {
            $this->entityManager->remove($currency1);
            $this->entityManager->flush();
        }

        if (null !== $currency2) {
            $this->entityManager->remove($currency2);
            $this->entityManager->flush();
        }

        if (null !== $currency3) {
            $this->entityManager->remove($currency3);
            $this->entityManager->flush();
        }

        $this->entityManager->flush();

        $currency1 = (new Currency('TS1'))
            ->setRate(1)
            ->setUpdatedAt(new \DateTime('2000-01-01'));

        $currency2 = (new Currency('TS2'))
            ->setRate(1)
            ->setUpdatedAt(new \DateTime('2000-01-01'));

        $this->entityManager->persist($currency1);
        $this->entityManager->persist($currency2);
        $this->entityManager->flush();
    }
}
