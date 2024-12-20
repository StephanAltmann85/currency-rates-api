<?php

declare(strict_types=1);

namespace App\Tests\integration\Persister;

use App\Entity\Currency;
use App\Entity\CurrencyRateHistory;
use App\EventListener\CurrencyUpdateEventListener;
use App\Persister\CollectionPersister;
use App\Persister\CurrencyCollectionPersister;
use App\Tests\integration\Helper\Trait\DatabaseTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Exception\ORMException;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\Tools\SchemaTool;
use Doctrine\ORM\Tools\ToolsException;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\UsesClass;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

#[CoversClass(CurrencyCollectionPersister::class)]
#[CoversClass(CurrencyUpdateEventListener::class)]
#[UsesClass(Currency::class)]
#[UsesClass(CurrencyRateHistory::class)]
class CurrencyCollectionPersisterTest extends KernelTestCase
{
    use DatabaseTrait;

    private CollectionPersister $persister;

    public function setUp(): void
    {
        self::bootKernel();
        $container = static::getContainer();

        /** @var CollectionPersister $persister */
        $persister = $container->get(CurrencyCollectionPersister::class);
        /** @var EntityManagerInterface $entityManager */
        $entityManager = $container->get(EntityManagerInterface::class);
        /** @var SchemaTool $schemaTool */
        $schemaTool = $container->get(SchemaTool::class);

        $this->persister = $persister;
        $this->entityManager = $entityManager;
        $this->schemaTool = $schemaTool;

        parent::setUp();
    }

    /**
     * @throws OptimisticLockException
     * @throws ORMException
     */
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

        $currencies = new ArrayCollection(['TS1' => $currency1, 'TS2' => $currency2, 'TS3' => $currency3]);

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

        $this->assertNotEquals('2000-01-01', $currency2->getUpdatedAt()->format('Y-m-d'));
        $this->assertEquals('2000-01-01', $currency2RateHistoryDate->format('Y-m-d'));
        $this->assertNotEmpty($currency2->getHistory());

        $this->assertEquals('2001-01-01', $currency3->getUpdatedAt()->format('Y-m-d'));
        $this->assertEmpty($currency3->getHistory());
    }

    /**
     * @throws ToolsException
     */
    private function createTestCurrencies(): void
    {
        $this->resetDatabase();

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
