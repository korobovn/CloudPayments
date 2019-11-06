<?php

namespace Korobovn\Tests\Feature;

use Korobovn\CloudPayments\Message\Request\TokenPaymentOneStepRequest;
use Korobovn\CloudPayments\Message\Response\InvalidRequestResponse;
use Korobovn\CloudPayments\Message\Response\TokenTransactionAcceptedResponse;
use Korobovn\CloudPayments\Message\Response\TokenTransactionRejectedResponse;

/**
 * @group feature
 * @group token-payment
 *
 * @see https://developers.cloudpayments.ru/#oplata-po-tokenu-rekarring
 */
class TokenPaymentTest extends AbstractFeatureTest
{
    public function test(): void
    {
        $request = new TokenPaymentOneStepRequest;
        $request->getModel()
            ->setAmount(10)
            ->setCurrency('RUB')
            ->setInvoiceId('1234567')
            ->setDescription('Test Description')
            ->setAccountId('user_x')
            ->setToken('a4e67841-abb0-42de-a364-d1d8f9f4b3c0');

        $response = $this->client->send($request);

        if ($response instanceof TokenTransactionAcceptedResponse) {
            $this->assertTrue(true);
        } elseif ($response instanceof TokenTransactionRejectedResponse) {
            $this->assertTrue(true);
        } elseif ($response instanceof InvalidRequestResponse) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
}
