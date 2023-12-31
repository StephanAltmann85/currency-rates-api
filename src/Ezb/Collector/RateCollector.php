<?php

declare(strict_types=1);

namespace App\Ezb\Collector;

use App\Ezb\Response\Dto\CurrencyRate;
use App\Ezb\Response\GetRatesResponse;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Exception\ValidationFailedException;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class RateCollector
{
    public function __construct(
        private readonly HttpClientInterface $client,
        private readonly SerializerInterface $serializer,
        private readonly ValidatorInterface $validator
    ) {
    }

    /**
     * @throws TransportExceptionInterface
     * @throws ServerExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ClientExceptionInterface
     * @throws ValidationFailedException
     *
     * @phpstan-return Collection<int, CurrencyRate>
     */
    public function collect(): Collection
    {
        // TODO: implement interface
        // TODO: const or env
        $content = $this->client->request('GET', 'https://www.ecb.europa.eu/stats/eurofxref/eurofxref-daily.xml');

        $response = $this->serializer->deserialize(
            $content->getContent(),
            GetRatesResponse::class,
            'xml',
            [XmlEncoder::ROOT_NODE_NAME => 'gesmes:Envelope']
        );

        $violations = $this->validator->validate($response);

        if ($violations->count() > 0) {
            throw new ValidationFailedException('Response validation failed', $violations);
        }

        // TODO: conversion

        return $response->getCurrencyRates();
    }
}
