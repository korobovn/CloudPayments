<?php

declare(strict_types = 1);

namespace Korobovn\Tests\Feature;

use Illuminate\Support\Arr;
use Korobovn\CloudPayments\Message\Request\CancelPaymentRequest;
use Korobovn\CloudPayments\Message\Request\CryptogramPaymentTwoStepRequest;
use Korobovn\CloudPayments\Message\Response\CryptogramTransactionAcceptedResponse;
use Korobovn\CloudPayments\Message\Response\SuccessResponse;

/**
 * @group feature
 * @group payment-cancel
 *
 * @see   https://developers.cloudpayments.ru/#otmena-oplaty
 * @coversNothing
 */
class PaymentCancelTest extends AbstractFeatureTest
{
    public function test(): void
    {
        $cryptogram_payment_two_step_request = new CryptogramPaymentTwoStepRequest;
        $cryptogram_payment_two_step_request
            ->setClient($this->client)
            ->getModel()
            ->setAmount(1.0)
            ->setCurrency('RUB')
            ->setAccountId('44234234234')
            ->setIpAddress('127.0.0.1')
            ->setName('CARDHOLDER NAME')
            ->setCardCryptogramPacket(Arr::get($this->card_cryptograms,
                'CARD_CRYPTOGRAM_PACKET_WITHOUT_3D_SUCCESS_MASTER_CARD'));

        $cryptogram_transaction_accepted_response = $cryptogram_payment_two_step_request->send();

        $this->assertInstanceOf(CryptogramTransactionAcceptedResponse::class,
            $cryptogram_transaction_accepted_response);

        $cancel_payment_request = new CancelPaymentRequest;
        $cancel_payment_request
            ->setClient($this->client)
            ->getModel()
            ->setTransactionId($cryptogram_transaction_accepted_response->getModel()->getTransactionId());

        $success_response = $cancel_payment_request->send();

        $this->assertInstanceOf(SuccessResponse::class, $success_response);
    }
}
