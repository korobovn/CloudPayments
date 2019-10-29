<?php

namespace Korobovn\CloudPayments\Client;

use Korobovn\CloudPayments\RequestManagementStrategy\RequestManagementStrategyInterface;
use Korobovn\CloudPayments\Response\ResponseInterface;
use Psr\Http\Client\ClientInterface;

class CloudPaymentClient implements CloudPaymentClientInterface
{
    /** @var ClientInterface */
    protected $client;

    /** @var string|string */
    protected $request_decorator_name;

    /** @var string */
    protected $request_adapter_name;

    /**
     * CloudPaymentClient constructor.
     *
     * @param ClientInterface $client
     * @param string          $request_decorator_name
     * @param string          $request_adapter_name
     */
    public function __construct(
        ClientInterface $client,
        string $request_decorator_name,
        string $request_adapter_name
    )
    {
        $this->client                 = $client;
        $this->request_decorator_name = $request_decorator_name;
        $this->request_adapter_name   = $request_adapter_name;
    }

    /**
     * {@inheritDoc}
     */
    public function send(RequestManagementStrategyInterface $request_management_strategy): ResponseInterface
    {
        $request = $request_management_strategy->getRequest();

        // $decorated_request = $this->request_decorator_name

        $this->client->sendRequest();
    }
}
