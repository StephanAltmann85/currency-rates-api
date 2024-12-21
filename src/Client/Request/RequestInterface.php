<?php

declare(strict_types=1);

namespace App\Client\Request;

interface RequestInterface
{
    public function getUrl(): string;

    public function getMethod(): string;

    public function getResponseClass(): string;

    public function getBody(): string;

    /** @return array<string, int|bool|string> */
    public function getHeaders(): array;
}
