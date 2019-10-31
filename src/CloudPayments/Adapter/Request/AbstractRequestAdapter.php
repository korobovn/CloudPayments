<?php

namespace Korobovn\CloudPayments\Adapter\Request;

use Korobovn\CloudPayments\Message\Request\Decorator\RequestDecoratorInterface;
use Psr\Http\Message\RequestInterface as PsrRequestInterface;

abstract class AbstractRequestAdapter implements PsrRequestInterface
{
    /**
     * @param RequestDecoratorInterface $request
     */
    abstract public function setRequest(RequestDecoratorInterface $request): void;

}
