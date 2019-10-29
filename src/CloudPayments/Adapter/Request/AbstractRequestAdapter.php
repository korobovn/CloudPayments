<?php

namespace Korobovn\CloudPayments\Adapter\Request;

use Korobovn\CloudPayments\Request\Decorator\RequestDecoratorInterface;
use Psr\Http\Message\RequestInterface as PsrRequestInterface;

abstract class AbstractRequestAdapter implements PsrRequestInterface
{
    abstract public function __construct(RequestDecoratorInterface $request);
}
