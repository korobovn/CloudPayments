<?php

namespace Korobovn\CloudPayments\Message\Request\Decorator;

use Korobovn\CloudPayments\Message\Request\Model\ModelInterface;
use Korobovn\CloudPayments\Message\Request\RequestInterface;

abstract class AbstractRequestDecorator implements RequestDecoratorInterface
{
    /** @var RequestInterface */
    protected $request;

    /** @var string */
    protected $method = 'POST';

    /** @var array */
    protected $headers = [];

    /**
     * @param RequestInterface $request
     */
    public function setRequest(RequestInterface $request): void
    {
        $this->request = $request;
    }

    /**
     * @return string|null
     */
    abstract public function getBody(): ?string;

    /**
     * @return ModelInterface
     */
    public function getModel(): ModelInterface
    {
        return $this->request->getModel();
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {

        return $this->request->getUrl();
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * @return array
     */
    public function getHeaders(): array
    {
        return $this->headers;
    }
}
