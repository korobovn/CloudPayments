<?php

declare(strict_types = 1);

namespace Korobovn\CloudPayments\Message\Request;

use Korobovn\CloudPayments\Client\CloudPaymentClientInterface;
use Korobovn\CloudPayments\Message\Response\ResponseInterface;
use Korobovn\CloudPayments\Message\Strategy\StrategyInterface;
use Korobovn\CloudPayments\Message\Request\Model\ModelInterface;

interface RequestInterface
{
    /**
     * Get a payment url. Request sent to this address
     *
     * @return string
     */
    public function getUrl(): string;

    /**
     * Get a data model of request. Different data models are set for different requests.
     *
     * @return ModelInterface
     */
    public function getModel(): ModelInterface;

    /**
     * Get a strategy that determines which response to this request should be returned
     *
     * @return StrategyInterface
     */
    public function getStrategy(): StrategyInterface;

    /**
     * The request body to send
     *
     * @return string|null
     * @throws \Tarampampam\Wrappers\Exceptions\JsonEncodeDecodeException
     *
     */
    public function getBody(): ?string;

    /**
     * Some request method, eq "POST", "GET". Default "POST"
     *
     * @return string
     */
    public function getMethod(): string;

    /**
     * Request Headers for HTTP request
     *
     * @return array
     */
    public function getHeaders(): array;

    /**
     * The method to send the request
     *
     * @return ResponseInterface
     */
    public function send(): ResponseInterface;

    /**
     * If we want use the `send` method, we should set a `CloudPaymentClientInterface`
     *
     * @param CloudPaymentClientInterface $client
     *
     * @return self
     */
    public function setClient(CloudPaymentClientInterface $client): self;
}
