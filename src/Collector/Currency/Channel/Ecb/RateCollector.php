<?php

declare(strict_types=1);

namespace App\Collector\Currency\Channel\Ecb;

use App\Client\ClientInterface;
use App\Collector\Currency\Channel\Ecb\Request\GetRatesRequest;
use App\Collector\Currency\RateCollectorInterface;
use App\Collector\Currency\Response\CurrencyRateResponseInterface;
use App\Collector\Currency\Validation\ValidatorInterface;
use App\Collector\Exception\TransportException;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Exception\UnexpectedValueException;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Contracts\HttpClient\Exception\ExceptionInterface;

class RateCollector implements RateCollectorInterface
{
    public function __construct(
        readonly private ClientInterface $client,
        readonly private SerializerInterface $serializer,
        readonly private ValidatorInterface $validator,
    ) {
    }

    public function collect(): Collection
    {
        $request = new GetRatesRequest();

        try {
            $content = $this->client->request($request);

            /** @var CurrencyRateResponseInterface $response */
            $response = $this->serializer->deserialize(
                $content->getContent(),
                $request->getResponseClass(),
                'xml',
                [XmlEncoder::ROOT_NODE_NAME => 'gesmes:Envelope']
            );
        } catch (ExceptionInterface|UnexpectedValueException $exception) {
            throw new TransportException($exception->getMessage(), $exception->getCode(), $exception);
        }

        $this->validator->validate($response, $response->getValidationGroups());

        return $response->getCurrencyRates();
    }

    public function getChannel(): string
    {
        return 'ECB';
    }

    public static function getPriority(): int
    {
        return 0;
    }
}
