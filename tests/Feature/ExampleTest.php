<?php

namespace Korobovn\Tests\Feature;

use GuzzleHttp\Client;
use Illuminate\Support\Arr;
use Korobovn\CloudPayments\Client\CloudPaymentClient;
use Korobovn\CloudPayments\Message\Request\CryptogramPaymentOneStepRequest;
use Korobovn\CloudPayments\Message\Response\CryptogramTransactionAcceptedResponse;
use Korobovn\CloudPayments\Message\Response\InvalidRequestResponse;
use PHPUnit\Framework\TestCase;

/**
 * @coversNothing
 */
class ExampleTest extends TestCase
{
    public function test(): void
    {
        $config      = include __DIR__ . '/../../config/services.php';
        $public_key  = Arr::get($config, 'cloud_payments.public_key');
        $private_key = Arr::get($config, 'cloud_payments.private_key');

        $client = new CloudPaymentClient(
            new Client,
            $public_key,
            $private_key
        );

        $request = new CryptogramPaymentOneStepRequest;
        $request
            ->setClient($client)
            ->getModel()
            ->setAmount(100.0)
            ->setCurrency('RUB')
            ->setIpAddress('127.0.0.1')
            ->setName('CARDHOLDER NAME')
            ->setCardCryptogramPacket(env('CARD_CRYPTOGRAM_PACKET_WITHOUT_3D_SUCCESS_MASTER_CARD'));

        $response = $request->send();

        if ($response instanceof CryptogramTransactionAcceptedResponse) {
            $transaction_id = $response->getModel()->getTransactionId();
        } elseif ($response instanceof InvalidRequestResponse) {
            $error_message = $response->getMessage();
        }

        $this->assertTrue(true);
    }
}
