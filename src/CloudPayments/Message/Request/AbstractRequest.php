<?php

namespace Korobovn\CloudPayments\Message\Request;

use Tarampampam\Wrappers\Json;
use Korobovn\CloudPayments\Client\CloudPaymentClientInterface;
use Korobovn\CloudPayments\Message\Response\ResponseInterface;
use Korobovn\CloudPayments\Message\Strategy\StrategyInterface;
use Korobovn\CloudPayments\Message\Request\Model\ModelInterface;

abstract class AbstractRequest implements RequestInterface
{
    /** @var string */
    protected $domain = 'https://api.cloudpayments.ru/';

    /** @var string */
    protected $url;

    /** @var ModelInterface */
    protected $model;

    /** @var StrategyInterface */
    protected $strategy;

    /** @var string */
    protected $method = 'POST';

    /** @var array */
    protected $headers = [
        'Content-Type' => 'application/json',
    ];

    /** @var CloudPaymentClientInterface */
    protected $client;

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return rtrim($this->domain, '/') . '/' . ltrim($this->url, '/');
    }

    /**
     * @return ModelInterface
     */
    public function getModel(): ModelInterface
    {
        return $this->model;
    }

    /**
     * @return StrategyInterface
     */
    public function getStrategy(): StrategyInterface
    {
        return $this->strategy;
    }

    /**
     * @return string|null
     * @throws \Tarampampam\Wrappers\Exceptions\JsonEncodeDecodeException
     *
     */
    public function getBody(): ?string
    {
        return Json::encode($this->getModel()->toArray());
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

    /**
     * @param CloudPaymentClientInterface $client
     *
     * @return self
     */
    public function setClient(CloudPaymentClientInterface $client): RequestInterface
    {
        $this->client = $client;

        return $this;
    }

    /**
     * @return ResponseInterface
     */
    public function send(): ResponseInterface
    {
        return $this->client->send($this);
    }
}
