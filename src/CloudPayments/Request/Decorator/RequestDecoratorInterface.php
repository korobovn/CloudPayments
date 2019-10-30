<?php

namespace Korobovn\CloudPayments\Request\Decorator;

use Korobovn\CloudPayments\Request\RequestInterface;

interface RequestDecoratorInterface extends RequestInterface
{
    /**
     * @return string|null
     */
    public function getBody(): ?string;

    /**
     * @return string
     */
    public function getMethod(): string;

    /**
     * @return array
     */
    public function getHeaders(): array;
}
