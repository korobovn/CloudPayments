<?php

declare(strict_types = 1);

namespace Korobovn\Tests\Feature;

use GuzzleHttp\Client as GuzzleHttpClient;
use Illuminate\Support\Arr;
use Korobovn\CloudPayments\Client\Client;
use Korobovn\CloudPayments\Message\Request\CryptogramPaymentOneStepRequest;
use Korobovn\CloudPayments\Message\Response\CryptogramTransactionAcceptedResponse;
use Korobovn\CloudPayments\Message\Response\InvalidRequestResponse;

/**
 * @group feature
 *
 * @coversNothing
 */
class ExampleTest extends AbstractFeatureTest
{
    public function test(): void
    {
        $config      = include __DIR__ . '/config.php';
        $public_key  = Arr::get($config, 'cloud_payments.public_key');
        $private_key = Arr::get($config, 'cloud_payments.private_key');

        $client = new Client(
            new GuzzleHttpClient,
            $public_key,
            $private_key
        );

        $request = CryptogramPaymentOneStepRequest::create();
        $request
            ->setClient($client)
            ->getModel()
            ->setAmount(100.0)
            ->setCurrency('RUB')
            ->setIpAddress('127.0.0.1')
            ->setName('CARDHOLDER NAME')
            ->setCardCryptogramPacket(Arr::get($this->card_cryptograms,'CARD_CRYPTOGRAM_PACKET_WITHOUT_3D_SUCCESS_MASTER_CARD'));

        $response = $request->send();

        if ($response instanceof CryptogramTransactionAcceptedResponse) {
            $transaction_id = $response->getModel()->getTransactionId();
        } elseif ($response instanceof InvalidRequestResponse) {
            $error_message = $response->getMessage();
        }

        $this->assertTrue(true);
    }
}
