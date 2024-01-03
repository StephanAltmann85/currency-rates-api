<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use App\Repository\CurrencyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Attribute\Groups;

// TODO: add behat tests
// TODO: finish unit tests
// TODO: add integration tests
// TODO: build docker image
// TODO: update swagger endpoint descriptions

#[ORM\Entity(repositoryClass: CurrencyRepository::class)]
#[ORM\HasLifecycleCallbacks]
#[ApiResource(
    operations: [
        new Get(),
        new GetCollection(),
    ],
    formats: ['json' => ['application/json'], 'csv' => ['text/csv']],
    normalizationContext: ['groups' => ['currency:get']],
    paginationEnabled: false
)]
#[ORM\Cache(usage: 'READ_ONLY')]
class Currency
{
    #[Groups(['currency:get'])]
    #[ORM\Id]
    #[ORM\Column(length: 3, unique: true)]
    private string $iso3;

    #[Groups(['currency:get'])]
    #[ORM\Column(nullable: false)]
    private float $rate;

    /** @phpstan-var Collection<int,CurrencyRateHistory> */
    #[ORM\OneToMany(mappedBy: 'currency', targetEntity: CurrencyRateHistory::class, cascade: ['all'], fetch: 'EXTRA_LAZY')]
    private Collection $history;

    #[Groups(['currency:get'])]
    #[ORM\Column(nullable: false)]
    private \DateTime $updatedAt;

    public function __construct(string $iso3)
    {
        $this->iso3 = $iso3;
        $this->history = new ArrayCollection();
        $this->updatedAt = new \DateTime();
    }

    public function getIso3(): string
    {
        return $this->iso3;
    }

    public function getRate(): float
    {
        return $this->rate;
    }

    public function setRate(float $rate): static
    {
        $this->rate = $rate;

        return $this;
    }

    /**
     * @phpstan-return Collection<int, CurrencyRateHistory>
     */
    public function getHistory(): Collection
    {
        return $this->history;
    }

    public function addHistory(CurrencyRateHistory $history): Currency
    {
        if (!$this->history->contains($history)) {
            $this->history->add($history);
            $history->setCurrency($this);
        }

        return $this;
    }

    public function removeHistory(CurrencyRateHistory $history): Currency
    {
        if ($this->history->removeElement($history)) {
            if ($history->getCurrency() === $this) {
                $history->setCurrency(null);
            }
        }

        return $this;
    }

    public function getUpdatedAt(): \DateTime
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTime $updatedAt): Currency
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }
}
