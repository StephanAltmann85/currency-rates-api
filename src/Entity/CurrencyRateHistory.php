<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Link;
use App\Repository\CurrencyRateHistoryRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Attribute\Groups;

#[ORM\Entity(repositoryClass: CurrencyRateHistoryRepository::class)]
#[ApiResource(
    operations: [
        new GetCollection(
            uriTemplate: '/currencies/{iso3}/history',
            uriVariables: [
                'iso3' => new Link(toProperty: 'currency', fromClass: Currency::class),
            ],
            requirements: ['iso3' => '[A-Z]{3}'],
            paginationItemsPerPage: 28
        ),
    ],
    formats: ['json' => ['application/json'], 'csv' => ['text/csv']],
    normalizationContext: ['groups' => ['history:get']],
    order: ['date' => 'DESC'],
)]
#[ORM\Cache(usage: 'READ_ONLY')]
class CurrencyRateHistory
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'CUSTOM')]
    #[ORM\Column(type: 'uuid', unique: true)]
    #[ORM\CustomIdGenerator(class: 'doctrine.uuid_generator')]
    private ?string $id = null;

    #[ORM\ManyToOne(inversedBy: 'history')]
    #[ORM\JoinColumn(referencedColumnName: 'iso3', nullable: false)]
    private ?Currency $currency = null;

    #[Groups(['history:get'])]
    #[ORM\Column]
    private ?float $rate = null;

    #[Groups(['history:get'])]
    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getCurrency(): ?Currency
    {
        return $this->currency;
    }

    public function setCurrency(?Currency $currency): static
    {
        $this->currency = $currency;

        return $this;
    }

    public function getRate(): ?float
    {
        return $this->rate;
    }

    public function setRate(float $rate): static
    {
        $this->rate = $rate;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): static
    {
        $this->date = $date;

        return $this;
    }
}
