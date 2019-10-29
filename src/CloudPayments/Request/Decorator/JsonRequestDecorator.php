<?php

namespace Korobovn\CloudPayments\Request\Decorator;

use Korobovn\CloudPayments\Request\Model\ModelInterface;
use Korobovn\CloudPayments\Request\RequestInterface;

class JsonRequestDecorator implements RequestDecoratorInterface
{
    /** @var RequestInterface */
    protected $request;

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
    public function getBody(): ?string
    {
        return json_encode($this->getModel()->toArray());
    }

    /**
     * @return ModelInterface
     */
    public function getModel(): ModelInterface
    {
        $this->request->getModel();
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        $this->request->getUrl();
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return $this->request->getMethod();
    }

    /**
     * @return array
     */
    public function getHeaders(): array
    {
        return $this->request->getHeaders();
    }

    /**
     * @return string
     */
    public function getVersion(): string
    {
        return $this->request->getVersion();
    }
}
