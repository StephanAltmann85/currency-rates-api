<?php

namespace App\Entity;

use App\Repository\CurrencyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CurrencyRepository::class)]
class Currency
{
    // TODO: on update (only if value has changed)
    // TODO: -> invalidate entity cache
    // TODO: store history
    // TODO: set updated at

    #[ORM\Id]
    #[ORM\Column(length: 3, unique: true)]
    private string $iso3;

    #[ORM\Column(nullable: true)]
    private float $rate;

    /** @phpstan-var Collection<int,CurrencyRateHistory> */
    #[ORM\OneToMany(mappedBy: 'currency', targetEntity: CurrencyRateHistory::class, cascade: ['all'], fetch: 'EXTRA_LAZY')]
    private Collection $history;

    public function __construct(string $iso3)
    {
        $this->iso3 = $iso3;
        $this->history = new ArrayCollection();
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

    // TODO: add updated at

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
            // set the owning side to null (unless already changed)
            if ($history->getCurrency() === $this) {
                $history->setCurrency(null);
            }
        }

        return $this;
    }
}
