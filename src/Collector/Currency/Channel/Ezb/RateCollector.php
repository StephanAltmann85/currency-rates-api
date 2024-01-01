<?php

declare(strict_types=1);

namespace App\Collector\Currency\Channel\Ezb;

use App\Collector\Currency\Channel\Ezb\Response\Dto\CurrencyRate;
use App\Collector\Currency\Channel\Ezb\Response\GetRatesResponse;
use App\Collector\Currency\RateCollectorInterface;
use App\Collector\Exception\TransportException;
use App\Collector\Exception\ValidationException;
use App\Repository\CurrencyRepository;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Contracts\HttpClient\Exception\ExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class RateCollector implements RateCollectorInterface
{
    public function __construct(
        private readonly HttpClientInterface $client,
        private readonly SerializerInterface $serializer,
        private readonly ValidatorInterface $validator,
        private readonly CurrencyRepository $currencyRepository
    ) {
    }

    /**
     * {@inheritdoc}
     */
    public function collect(): Collection
    {
        // TODO: const or env
        try {
            $content = $this->client->request('GET', 'https://www.ecb.europa.eu/stats/eurofxref/eurofxref-daily.xml');

            $response = $this->serializer->deserialize(
                $content->getContent(),
                GetRatesResponse::class,
                'xml',
                [XmlEncoder::ROOT_NODE_NAME => 'gesmes:Envelope']
            );
        } catch (ExceptionInterface $exception) {
            throw new TransportException($exception->getMessage(), $exception->getCode(), $exception);
        }

        $violations = $this->validator->validate($response);

        if ($violations->count() > 0) {
            throw new ValidationException(GetRatesResponse::class, $violations);
        }

        return $response->getCurrencyRates()->map(
            /** @phpstan-ignore-next-line */
            fn (CurrencyRate $currencyRate) => $this->currencyRepository->findOrCreate($currencyRate->getIso3())->setRate($currencyRate->getRate())
        );
    }

    public function getChannel(): string
    {
        return 'EZB';
    }

    public static function getPriority(): int
    {
        return 0;
    }
}
