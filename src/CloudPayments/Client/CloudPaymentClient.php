<?php

namespace Korobovn\CloudPayments\Client;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Request;
use Korobovn\CloudPayments\Client\Exception\InvalidHttpResponseCodeException;
use Korobovn\CloudPayments\Message\Request\RequestInterface;
use Korobovn\CloudPayments\Message\Response\ResponseInterface;
use Psr\Http\Message\RequestInterface as PsrRequestInterface;
use Psr\Http\Message\ResponseInterface as PsrResponseInterface;
use Tarampampam\Wrappers\Json;

class CloudPaymentClient implements CloudPaymentClientInterface
{
    /** @var ClientInterface */
    protected $http_client;

    /** @var string */
    protected $public_id;

    /** @var string */
    protected $api_secret;

    /**
     *
     * @param Client $http_client
     * @param string $public_id
     * @param string $api_secret
     */
    public function __construct(
        ClientInterface $http_client,
        string $public_id,
        string $api_secret
    )
    {
        $this->http_client = $http_client;
        $this->public_id   = $public_id;
        $this->api_secret  = $api_secret;
    }

    /**
     * {@inheritDoc}
     */
    public function send(RequestInterface $request): ResponseInterface
    {
        $psr_request  = new Request(
            $request->getMethod(),
            $request->getUrl(),
            $request->getHeaders(),
            $request->getBody()
        );
        $psr_response = $this->sendHttpRequest($psr_request);
        $raw_response = $this->decodeBody($psr_response->getBody()->getContents());

        return $request->getStrategy()->prepareRawResponse($raw_response);
    }

    /**
     * @param string $body
     *
     * @return array
     */
    protected function decodeBody(string $body): array
    {
        return Json::decode($body, true);
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

        try {
            $psr_response = $this->http_client->send($request);
        } catch (RequestException $exception) {
            if ($exception->hasResponse()) {
                $psr_response = $exception->getResponse();
            } else {
                throw new InvalidHttpResponseCodeException($exception->getMessage(), $exception->getCode(), $exception);
            }
        }

        if ($psr_response->getStatusCode() != 200) {
            throw new InvalidHttpResponseCodeException(sprintf('%d is an invalid http response code',
                $psr_response->getStatusCode()));
        }

        return $psr_response;
    }

    /**
     * @param PsrRequestInterface $request
     */
    protected function setAuthHeader(PsrRequestInterface &$request): void
    {
        $request = $request->withAddedHeader('Authorization', sprintf('Basic %s',
            base64_encode($this->public_id . ':' . $this->api_secret)));
    }
}
