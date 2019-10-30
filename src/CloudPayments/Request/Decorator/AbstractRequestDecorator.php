<?php

namespace Korobovn\CloudPayments\Request\Decorator;

use Korobovn\CloudPayments\Request\Model\ModelInterface;
use Korobovn\CloudPayments\Request\RequestInterface;

abstract class AbstractRequestDecorator implements RequestDecoratorInterface
{
    /** @var RequestInterface */
    protected $request;

    /** @var string */
    protected $method = 'POST';

    /** @var array */
    protected $headers = [];

    /**
     * JsonRequestDecorator constructor.
     *
     * @param RequestInterface $request
     */
    public function __construct(RequestInterface $request)
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
