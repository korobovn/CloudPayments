<?php

namespace Korobovn\CloudPayments\Client;

use Korobovn\CloudPayments\Adapter\Request\AbstractRequestAdapter;
use Korobovn\CloudPayments\Client\Exception\JsonDecodeErrorException;
use Korobovn\CloudPayments\Client\Exception\InvalidHttpResponseCodeException;
use Korobovn\CloudPayments\Request\Decorator\RequestDecoratorInterface;
use Korobovn\CloudPayments\RequestManagementStrategy\RequestManagementStrategyInterface;
use Korobovn\CloudPayments\Response\ResponseInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestInterface as PsrRequestInterface;
use Psr\Http\Message\ResponseInterface as PsrResponseInterface;

class CloudPaymentClient implements CloudPaymentClientInterface
{
    /** @var ClientInterface */
    protected $http_client;

    /** @var RequestDecoratorInterface */
    protected $request_decorator;

    /** @var AbstractRequestAdapter */
    protected $request_adapter;

    /**
     * CloudPaymentClient constructor.
     *
     * @param ClientInterface           $http_client
     * @param RequestDecoratorInterface $request_decorator
     * @param AbstractRequestAdapter    $request_adapter
     */
    public function __construct(
        ClientInterface $http_client,
        RequestDecoratorInterface $request_decorator,
        AbstractRequestAdapter $request_adapter
    )
    {
        $this->http_client       = $http_client;
        $this->request_decorator = $request_decorator;
        $this->request_adapter   = $request_adapter;
    }

    /**
     * {@inheritDoc}
     */
    public function send(RequestManagementStrategyInterface $request_management_strategy): ResponseInterface
    {
        $request = $request_management_strategy->getRequest();

        $this->request_decorator->setRequest($request);
        $this->request_adapter->setRequest($this->request_decorator);


        $psr_response = $this->sendHttpRequest($this->request_adapter);
        $raw_response = $this->decodeBody($psr_response->getBody()->getContents());

        return $request_management_strategy->prepareRawResponse($raw_response);
    }

    /**
     * @param string $body
     *
     * @return array
     * @throws JsonDecodeErrorException
     */
    protected function decodeBody(string $body): array
    {
        $result = json_decode($body, true);

        if (json_last_error() != JSON_ERROR_NONE) {
            throw new JsonDecodeErrorException(sprintf('Json Decode Error: %d - %s',
                json_last_error(), json_last_error_msg()));
        }

        return $result;
    }

    /**
     * @param PsrRequestInterface $request
     *
     * @return PsrResponseInterface
     * @throws InvalidHttpResponseCodeException
     */
    protected function sendHttpRequest(PsrRequestInterface $request): PsrResponseInterface
    {
        $psr_response = $this->http_client->sendRequest($request);

        if ($psr_response->getStatusCode() != 200) {
            throw new InvalidHttpResponseCodeException(sprintf('%d is an invalid http response code',
                $psr_response->getStatusCode()));
        }

        return $psr_response;
    }
}
