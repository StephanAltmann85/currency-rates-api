<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\CurrencyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Event\PrePersistEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CurrencyRepository::class)]
#[ORM\HasLifecycleCallbacks]
#[ApiResource]
class Currency
{
    // TODO: on update (only if value has changed -> preUpdate)
    // TODO: -> invalidate entity cache
    // TODO: store history

    #[ORM\Id]
    #[ORM\Column(length: 3, unique: true)]
    private string $iso3;

    #[ORM\Column(nullable: false)]
    private float $rate;

    /** @phpstan-var Collection<int,CurrencyRateHistory> */
    #[ORM\OneToMany(mappedBy: 'currency', targetEntity: CurrencyRateHistory::class, cascade: ['all'], fetch: 'EXTRA_LAZY')]
    private Collection $history;

    #[ORM\Column(nullable: false)]
    private \DateTime $updatedAt;

    public function __construct(string $iso3)
    {
        $this->iso3 = $iso3;
        $this->history = new ArrayCollection();
    }

    #[ORM\PrePersist]
    #[ORM\PreUpdate]
    public function setUpdatedAtOnCreationOrdUpdate(PrePersistEventArgs|PreUpdateEventArgs $eventArgs): void
    {
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
     * @return Collection<int, CurrencyRateHistory>
     */
    public function getHistory(): Collection
    {
        return $this->history;
    }

    public function addHistory(CurrencyRateHistory $history): static
    {
        if (!$this->history->contains($history)) {
            $this->history->add($history);
            $history->setCurrency($this);
        }

        return $this;
    }

    public function removeHistory(CurrencyRateHistory $history): static
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
