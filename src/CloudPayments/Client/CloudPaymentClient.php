<?php

namespace Korobovn\CloudPayments\Client;

use Korobovn\CloudPayments\Adapter\Request\AbstractRequestAdapter;
use Korobovn\CloudPayments\Client\Exception\ClassIsNotInstanceOfAbstractRequestAdapterException;
use Korobovn\CloudPayments\Client\Exception\ClassIsNotInstanceOfRequestDecoratorInterfaceException;
use Korobovn\CloudPayments\Client\Exception\JsonDecodeErrorException;
use Korobovn\CloudPayments\Client\Exception\InvalidHttpResponseCodeException;
use Korobovn\CloudPayments\Client\Exception\RequestAdapterClassNotFoundException;
use Korobovn\CloudPayments\Client\Exception\RequestDecoratorClassNotFoundException;
use Korobovn\CloudPayments\Request\Decorator\RequestDecoratorInterface;
use Korobovn\CloudPayments\Request\RequestInterface;
use Korobovn\CloudPayments\RequestManagementStrategy\RequestManagementStrategyInterface;
use Korobovn\CloudPayments\Response\ResponseInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestInterface as PsrRequestInterface;
use Psr\Http\Message\ResponseInterface as PsrResponseInterface;

class CloudPaymentClient implements CloudPaymentClientInterface
{
    /** @var ClientInterface */
    protected $http_client;

    /** @var string|string */
    protected $request_decorator_class_name;

    /** @var string */
    protected $request_adapter_class_name;

    /**
     * CloudPaymentClient constructor.
     *
     * @param ClientInterface $http_client
     * @param string          $request_decorator_class_name
     * @param string          $request_adapter_class_name
     *
     * @throws RequestAdapterClassNotFoundException
     * @throws RequestDecoratorClassNotFoundException
     */
    public function __construct(
        ClientInterface $http_client,
        string $request_decorator_class_name,
        string $request_adapter_class_name
    )
    {
        $this->http_client = $http_client;

        if (! class_exists($request_decorator_class_name)) {
            throw new RequestDecoratorClassNotFoundException(sprintf('%s decorator class not found',
                $request_decorator_class_name));
        }
        $this->request_decorator_class_name = $request_decorator_class_name;

        if (! class_exists($request_adapter_class_name)) {
            throw new RequestAdapterClassNotFoundException(sprintf('%s adaptor class not found',
                $request_adapter_class_name));
        }
        $this->request_adapter_class_name = $request_adapter_class_name;
    }

    /**
     * {@inheritDoc}
     */
    public function send(RequestManagementStrategyInterface $request_management_strategy): ResponseInterface
    {
        $request           = $request_management_strategy->getRequest();
        $request_decorator = $this->createRequestDecorator($request);

        $request_adaptor   = $this->createRequestAdaptor($request_decorator);

        $psr_response = $this->sendHttpRequest($request_adaptor);

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

    /**
     * @param RequestInterface $request
     *
     * @return RequestDecoratorInterface
     * @throws ClassIsNotInstanceOfRequestDecoratorInterfaceException
     */
    protected function createRequestDecorator(RequestInterface $request): RequestDecoratorInterface
    {
        try {
            /** @var RequestDecoratorInterface $request_decorator */
            $request_decorator = new $this->request_decorator_class_name($request);
        } catch (\Exception $exception) {
            throw new ClassIsNotInstanceOfRequestDecoratorInterfaceException(
                sprintf('The class %s is not instance of RequestDecoratorInterface',
                    $this->request_decorator_class_name),
                $exception->getCode(),
                $exception
            );
        }

        if (! ($request_decorator instanceof RequestDecoratorInterface)) {
            throw new ClassIsNotInstanceOfRequestDecoratorInterfaceException(
                sprintf('The class %s is not instance of RequestDecoratorInterface',
                    $this->request_decorator_class_name));
        }

        return $request_decorator;
    }

    /**
     * @param RequestDecoratorInterface $request_decorator
     *
     * @return AbstractRequestAdapter|PsrRequestInterface
     * @throws ClassIsNotInstanceOfAbstractRequestAdapterException
     */
    protected function createRequestAdaptor(RequestDecoratorInterface $request_decorator): AbstractRequestAdapter
    {
        try {
            $request_adaptor = new $this->request_adapter_class_name($request_decorator);
        } catch (\Exception $exception) {
            throw new ClassIsNotInstanceOfAbstractRequestAdapterException(
                sprintf('The class %s is not instance of AbstractRequestAdapter', $this->request_adapter_class_name),
                $exception->getCode(),
                $exception
            );
        }

        if (! ($request_adaptor instanceof AbstractRequestAdapter)) {
            throw new ClassIsNotInstanceOfAbstractRequestAdapterException(
                sprintf('The class %s is not instance of AbstractRequestAdapter',
                    $this->request_adapter_class_name));
        }

        return $request_adaptor;
    }
}
