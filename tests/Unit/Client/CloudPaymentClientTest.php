<?php

namespace Korobovn\Tests\Unit\Client;

use GuzzleHttp\ClientInterface;
use Korobovn\CloudPayments\Client\CloudPaymentClient;
use Korobovn\CloudPayments\Client\CloudPaymentClientInterface;
use Korobovn\CloudPayments\Message\Request\CryptogramPaymentOneStepRequest;
use Korobovn\CloudPayments\Message\Response\InvalidRequestResponse;
use Korobovn\CloudPayments\Message\Response\Cryptogram3dSecureAuthRequiredResponse;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;
use Tarampampam\Wrappers\Json;

/**
 * @group unit
 */
class CloudPaymentClientTest extends TestCase
{
    /** @var CryptogramPaymentOneStepRequest */
    protected $request;

    /**
     * @inheritdoc
     */
    public function setUp(): void
    {
        $this->request = new CryptogramPaymentOneStepRequest;
        $this->request->getModel()
            ->setAmount(10)
            ->setCurrency('RUB')
            ->setIpAddress('127.0.0.1')
            ->setName('CARDHOLDER NAME')
            ->setCardCryptogramPacket('01492500008719030128SMfLeYdKp5dSQVIiO5l6ZCJiPdel4uDjdFTTz1UnXY')
            ->setInvoiceId('1234567')
            ->setDescription('Test Description')
            ->setAccountId('account_id')
            ->setEmail('mail@mail.com');
    }

    public function testInvalidRequestResponse(): void
    {
        $raw_response = [
            'Success' => false,
            'Message' => 'Amount is required',
        ];

        $cloud_payment_client = $this->createCloudPaymentClient($raw_response, 200);

        $response = $cloud_payment_client->send($this->request);

        $this->assertTrue($response instanceof InvalidRequestResponse);
    }

    public function testCryptogram3dSecureAuthRequiredResponse(): void
    {
        $raw_response = [
            'Model'   => [
                'TransactionId' => 504,
                'PaReq'         => 'RXDe9mLgo0Z1nhpU9PQasWmPhLYAKksuEChfn13uVR9mGTO7MzZM2dg3qSn0Q',
                'AcsUrl'        => 'https://test.paymentgate.ru/acs/auth/start.do',
            ],
            'Success' => false,
            'Message' => null,
        ];

        $cloud_payment_client = $this->createCloudPaymentClient($raw_response, 200);

        $response = $cloud_payment_client->send($this->request);

        $this->assertTrue($response instanceof Cryptogram3dSecureAuthRequiredResponse);
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

        $cloud_payment_client = (new CloudPaymentClient(
            $http_client,
            '',
            ''
        ));

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
        $content = Json::encode($raw_response);

        $stream = $this->createMock(StreamInterface::class);
        $stream->method('getContents')
            ->willReturn($content);

        $psr_response = $this->createMock(ResponseInterface::class);
        $psr_response->method('getStatusCode')
            ->willReturn($status_code);

        $psr_response->method('getBody')
            ->willReturn($stream);

        $http_client = $this->createMock(ClientInterface::class);
        $http_client->method('send')
            ->willReturn($psr_response);

        return $http_client;
    }
}
