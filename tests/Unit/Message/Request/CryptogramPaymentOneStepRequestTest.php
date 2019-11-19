<?php

namespace Korobovn\Tests\Unit\Message\Request;

use Korobovn\CloudPayments\Message\Request\CryptogramPaymentOneStepRequest;

/**
 * @group  unit
 * @group  cryptogram-payment-one-step-request
 * @covers \Korobovn\CloudPayments\Message\Request\CryptogramPaymentOneStepRequest
 */
class CryptogramPaymentOneStepRequestTest extends BaseRequestTest
{
    protected function getTestClassName(): string
    {
        return CryptogramPaymentOneStepRequest::class;
    }

    protected function getExpectedUrl(): string
    {
        return 'https://api.cloudpayments.ru/payments/cards/charge';
    }
}
