<?php

declare(strict_types=1);

namespace App\Tests\behat\Context;

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\KernelInterface;
use Webmozart\Assert\Assert;

class ApiContext implements Context
{
    /** @phpstan-var array<string,int|string>  */
    private array $headers = [];
    private Response $response;

    public function __construct(
        private readonly KernelInterface $kernel
    ) {
    }

    /**
     * @Given the :header request header is :value
     */
    public function setRequestHeader(string $header, string $value): void
    {
        $this->headers = array_merge([$header => $value], $this->headers);
    }

    /**
     * @When I request :url with method :method
     *
     * @throws \Exception
     */
    public function iRequestUrlWithMethod(string $url, string $method): void
    {
        $request = Request::create($url, $method);
        $request->headers->add($this->headers);
        $this->response = $this->kernel->handle($request);

        $this->headers = [];
    }

    /**
     * @Then the status code is :code
     */
    public function theStatusCodeIs(int $code): void
    {
        Assert::eq($this->response->getStatusCode(), $code);
    }

    /**
     * @Then the response body contains:
     */
    public function theResponseBodyContains(PyStringNode $body): void
    {
        Assert::contains((string) $this->response->getContent(), $body->getRaw());
    }

    /**
     * @Then the response body contains :count elements
     *
     * @throws \JsonException
     */
    public function theResponseBodyContainsNElements(int $count): void
    {
        /** @phpstan-var array<mixed> $elements */
        $elements = json_decode((string) $this->response->getContent(), true, flags: JSON_THROW_ON_ERROR);

        Assert::count($elements, $count);
    }
}
