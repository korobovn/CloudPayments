<?php

namespace Korobovn\CloudPayments\Client;

use GuzzleHttp\Psr7\Request;
use Korobovn\CloudPayments\Client\Exception\JsonDecodeErrorException;
use Korobovn\CloudPayments\Client\Exception\InvalidHttpResponseCodeException;
use Korobovn\CloudPayments\Message\Request\Decorator\JsonRequestDecorator;
use Korobovn\CloudPayments\Message\Request\Decorator\RequestDecoratorInterface;
use Korobovn\CloudPayments\Message\Request\RequestInterface;
use Korobovn\CloudPayments\Message\Response\ResponseInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestInterface as PsrRequestInterface;
use Psr\Http\Message\ResponseInterface as PsrResponseInterface;

class CloudPaymentClient implements CloudPaymentClientInterface
{
    /** @var ClientInterface */
    protected $http_client;

    /** @var RequestDecoratorInterface */
    protected $request_decorator;

    /** @var string */
    protected $public_id;

    /** @var string */
    protected $api_secret;

    /**
     * CloudPaymentClient constructor.
     *
     * @param ClientInterface $http_client
     * @param string          $public_id
     * @param string          $api_secret
     */
    public function __construct(
        ClientInterface $http_client,
        string $public_id,
        string $api_secret
    )
    {
        $this->http_client       = $http_client;
        $this->public_id         = $public_id;
        $this->api_secret        = $api_secret;
        $this->request_decorator = new JsonRequestDecorator;
    }

    /**
     * @param RequestDecoratorInterface $request_decorator
     *
     * @return $this
     */
    public function setRequestDecorator(RequestDecoratorInterface $request_decorator): self
    {
        $this->request_decorator = $request_decorator;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function send(RequestInterface $request): ResponseInterface
    {
        $this->request_decorator->setRequest($request);

        $psr_request  = new Request(
            $this->request_decorator->getMethod(),
            $this->request_decorator->getUrl(),
            $this->request_decorator->getHeaders(),
            $this->request_decorator->getBody()
        );
        $psr_response = $this->sendHttpRequest($psr_request);
        $raw_response = $this->decodeBody($psr_response->getBody()->getContents());

        return $request->getStrategy()->prepareRawResponse($raw_response);
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
        $this->setAuthHeader($request);

        $psr_response = $this->http_client->sendRequest($request);

        if ($psr_response->getStatusCode() != 200) {
            throw new InvalidHttpResponseCodeException(sprintf('%d is an invalid http response code',
                $psr_response->getStatusCode()));
        }

        return $psr_response;
    }

    /**
     * @param PsrRequestInterface $request
     */
    protected function setAuthHeader(PsrRequestInterface $request): void
    {
        $request = $request->withAddedHeader('Authorization', sprintf('Basic %s',
            base64_encode($this->public_id . ':' . $this->api_secret)));
    }
}
