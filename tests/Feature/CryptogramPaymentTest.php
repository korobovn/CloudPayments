<?php

namespace Korobovn\Tests\Feature;

use Korobovn\CloudPayments\Message\Request\CryptogramPaymentOneStepRequest;
use Korobovn\CloudPayments\Message\Response\Cryptogram3dSecureAuthRequiredResponse;
use Korobovn\CloudPayments\Message\Response\CryptogramTransactionAcceptedResponse;
use Korobovn\CloudPayments\Message\Response\CryptogramTransactionRejectedResponse;
use Korobovn\CloudPayments\Message\Response\InvalidRequestResponse;

/**
 * @group feature
 * @group cryptogram-payment
 *
 * @see https://developers.cloudpayments.ru/#oplata-po-kriptogramme
 */
class CryptogramPaymentTest extends AbstractFeatureTest
{
    public function test(): void
    {
        $request = new CryptogramPaymentOneStepRequest;
        $request->getModel()
            ->setAmount(10)
            ->setCurrency('RUB')
            ->setIpAddress('127.0.0.1')
            ->setName('CARDHOLDER NAME')
            ->setCardCryptogramPacket('01492500008719030128SMfLeYdKp5dSQVIiO5l6ZCJiPdel4uDjdFTTz1UnXY')
            ->setInvoiceId('1234567')
            ->setDescription('Test Description')
            ->setAccountId('account_id')
            ->setEmail('mail@mail.com');

        $response = $this->client->send($request);

        if ($response instanceof CryptogramTransactionAcceptedResponse) {
            $this->assertTrue(true);
        } elseif ($response instanceof CryptogramTransactionRejectedResponse) {
            $this->assertTrue(true);
        } elseif ($response instanceof Cryptogram3dSecureAuthRequiredResponse) {
            $this->assertTrue(true);
        } elseif ($response instanceof InvalidRequestResponse) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
}
