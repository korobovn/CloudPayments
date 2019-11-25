<?php

declare(strict_types = 1);

namespace Korobovn\CloudPayments\Message\Request;

use Tarampampam\Wrappers\Json;
use Korobovn\CloudPayments\Client\CloudPaymentClientInterface;
use Korobovn\CloudPayments\Message\Response\ResponseInterface;
use Korobovn\CloudPayments\Message\Strategy\StrategyInterface;
use Korobovn\CloudPayments\Message\Request\Model\ModelInterface;

abstract class AbstractRequest implements RequestInterface
{
    protected const API_CLOUD_PAYMENT_DOMAIN = 'https://api.cloudpayments.ru/';

    /**
     * @var string
     */
    protected $url;

    /** @var ModelInterface */
    protected $model;

    /** @var StrategyInterface */
    protected $strategy;

    /**
     * @var string
     */
    protected $method = 'POST';

    /**
     * @var array
     */
    protected $headers = [
        'Content-Type' => 'application/json',
    ];

    /**
     * @var CloudPaymentClientInterface
     */
    protected $client;

    /**
     * {@inheritDoc}
     */
    public function getUrl(): string
    {
        return rtrim($this->getDomain(), '/') . '/' . ltrim($this->url, '/');
    }

    /**
     * Main domain name of cloud payments api server
     *
     * @return string
     */
    protected function getDomain(): string
    {
        return static::API_CLOUD_PAYMENT_DOMAIN;
    }

    /**
     * {@inheritDoc}
     */
    public function getModel(): ModelInterface
    {
        return $this->model;
    }

    /**
     * {@inheritDoc}
     */
    public function getStrategy(): StrategyInterface
    {
        return $this->strategy;
    }

    /**
     * {@inheritDoc}
     */
    public function getBody(): ?string
    {
        return Json::encode($this->getModel()->toArray());
    }

    /**
     * {@inheritDoc}
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * {@inheritDoc}
     */
    public function getHeaders(): array
    {
        return $this->headers;
    }

    /**
     * {@inheritDoc}
     */
    public function setClient(CloudPaymentClientInterface $client): RequestInterface
    {
        $this->client = $client;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function send(): ResponseInterface
    {
        return $this->client->send($this);
    }
}
