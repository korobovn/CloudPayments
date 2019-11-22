<?php

declare(strict_types = 1);

namespace Korobovn\CloudPayments\Client;

use GuzzleHttp\Psr7\Request;
use Tarampampam\Wrappers\Exceptions\JsonEncodeDecodeException;
use Tarampampam\Wrappers\Json;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use Korobovn\CloudPayments\Message\Request\RequestInterface;
use Psr\Http\Message\RequestInterface as PsrRequestInterface;
use Korobovn\CloudPayments\Message\Response\ResponseInterface;
use Psr\Http\Message\ResponseInterface as PsrResponseInterface;
use Korobovn\CloudPayments\Client\Exception\InvalidHttpResponseCodeException;

class CloudPaymentClient implements CloudPaymentClientInterface
{
    /** @var ClientInterface */
    protected $http_client;

    /** @var string */
    protected $public_id;

    /** @var string */
    protected $api_secret;

    /**
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
        $this->http_client = $http_client;
        $this->public_id   = $public_id;
        $this->api_secret  = $api_secret;
    }

    /**
     * {@inheritdoc}
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
     * @throws JsonEncodeDecodeException
     */
    protected function decodeBody(string $body): array
    {
        return (array) Json::decode($body, true);
    }

    /**
     * @param PsrRequestInterface $request
     *
     * @return PsrResponseInterface
     * @throws InvalidHttpResponseCodeException
     * @throws \InvalidArgumentException
     *
     */
    protected function sendHttpRequest(PsrRequestInterface $request): PsrResponseInterface
    {
        $request = $this->setAuthHeader($request);

        try {
            $psr_response = $this->http_client->send($request);
            if ($psr_response == null) {
                throw new InvalidHttpResponseCodeException('Zero response received');
            }
        } catch (RequestException $exception) {
            if ($exception->hasResponse()) {
                $psr_response = $exception->getResponse();
                if ($psr_response == null) {
                    throw new InvalidHttpResponseCodeException('Zero response received');
                }
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
     *
     * @return PsrRequestInterface
     */
    protected function setAuthHeader(PsrRequestInterface $request): PsrRequestInterface
    {
        /** @var PsrRequestInterface $request */
        $request = $request->withAddedHeader('Authorization', sprintf('Basic %s',
            base64_encode($this->public_id . ':' . $this->api_secret)));

        return $request;
    }
}
