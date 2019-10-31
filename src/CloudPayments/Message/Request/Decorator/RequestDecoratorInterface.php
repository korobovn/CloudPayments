<?php

namespace Korobovn\CloudPayments\Message\Request\Decorator;

use Korobovn\CloudPayments\Message\Request\RequestInterface;

interface RequestDecoratorInterface extends RequestInterface
{
    /**
     * @param RequestInterface $request
     */
    public function setRequest(RequestInterface $request): void;

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
