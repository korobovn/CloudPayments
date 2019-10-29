<?php

namespace Korobovn\CloudPayments\Request\Decorator;

use Korobovn\CloudPayments\Request\RequestInterface;

interface RequestDecoratorInterface extends RequestInterface
{
    /**
     * @return string|null
     */
    public function getBody(): ?string;
}
