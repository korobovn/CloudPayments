<?php

namespace Korobovn\Tests\Client;

use Korobovn\CloudPayments\Client\CloudPaymentClient;
use Korobovn\CloudPayments\Client\CloudPaymentClientInterface;
use Korobovn\CloudPayments\Gateway\Adapter\Request\GuzzleRequestAdapter;
use Korobovn\CloudPayments\Request\CryptogramPaymentOnestepRequest;
use Korobovn\CloudPayments\Request\Decorator\JsonRequestDecorator;
use Korobovn\CloudPayments\Request\Model\CryptogramPaymentModel;
use Korobovn\CloudPayments\RequestManagementStrategy\CryptogramPaymentOnestepRequestManagementStrategy;
use Korobovn\CloudPayments\Response\InvalidRequestResponse;
use PHPUnit\Framework\TestCase;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;

class CloudPaymentClientTest extends TestCase
{
    public function testInvalidRequestResponse(): void
    {
        $raw_response = [
            'Success' => false,
            'Message' => 'Amount is required',
        ];

        $cloud_payment_client = $this->createCloudPaymentClient($raw_response, 200);

        $strategy = new CryptogramPaymentOnestepRequestManagementStrategy(new CryptogramPaymentOnestepRequest(
            new CryptogramPaymentModel(
                10,
                'RUB',
                '1234567',
                'Оплата товаров в example.com',
                'user_x',
                'CARDHOLDER NAME',
                '01492500008719030128SMfLeYdKp5dSQVIiO5l6ZCJiPdel4uDjdFTTz1UnXY'
            )
        ));

        $response = $cloud_payment_client->send($strategy);

        $this->assertTrue($response instanceof InvalidRequestResponse);
    }

    /**
     * @param array $raw_response
     * @param int   $status_code
     *
     * @return CloudPaymentClientInterface
     */
    protected function createCloudPaymentClient(array $raw_response,
                                                int $status_code = 200): CloudPaymentClientInterface
    {
        $http_client = $this->createHttpClientMock($raw_response, $status_code);

        $cloud_payment_client = new CloudPaymentClient(
            $http_client,
            JsonRequestDecorator::class,
            GuzzleRequestAdapter::class
        );

        return $cloud_payment_client;
    }

    /**
     * @param array $raw_response
     * @param int   $status_code
     *
     * @return ClientInterface
     */
    protected function createHttpClientMock(array $raw_response, int $status_code = 200): ClientInterface
    {
        $content = json_encode($raw_response);

        $stream = $this->createMock(StreamInterface::class);
        $stream->method('getContents')
            ->willReturn($content);

        $psr_response = $this->createMock(ResponseInterface::class);
        $psr_response->method('getStatusCode')
            ->willReturn($status_code);

        $psr_response->method('getBody')
            ->willReturn($stream);

        $http_client = $this->createMock(ClientInterface::class);
        $http_client->method('sendRequest')
            ->willReturn($psr_response);

        return $http_client;
    }
}
