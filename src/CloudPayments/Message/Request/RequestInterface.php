<?php

namespace Korobovn\CloudPayments\Message\Request;

use Korobovn\CloudPayments\Client\CloudPaymentClientInterface;
use Korobovn\CloudPayments\Message\Response\ResponseInterface;
use Korobovn\CloudPayments\Message\Strategy\StrategyInterface;
use Korobovn\CloudPayments\Message\Request\Model\ModelInterface;

interface RequestInterface
{
    /**
     * @return ModelInterface
     */
    public function getModel(): ModelInterface;

    /**
     * @return string
     */
    public function getUrl(): string;

    /**
     * @return StrategyInterface
     */
    public function getStrategy(): StrategyInterface;

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

    /**
     * @return ResponseInterface
     */
    public function send(): ResponseInterface;

    /**
     * @param CloudPaymentClientInterface $client
     *
     * @return $this
     */
    public function setClient(CloudPaymentClientInterface $client): self;
}
