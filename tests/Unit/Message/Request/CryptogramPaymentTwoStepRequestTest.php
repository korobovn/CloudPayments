<?php

namespace Korobovn\Tests\Unit\Message\Request;

use Korobovn\CloudPayments\Message\Request\CryptogramPaymentTwoStepRequest;

/**
 * @group  unit
 * @group  cryptogram-payment-two-step-request
 * @covers \Korobovn\CloudPayments\Message\Request\CryptogramPaymentTwoStepRequest
 */
class CryptogramPaymentTwoStepRequestTest extends BaseRequestTest
{
    protected function getTestClassName(): string
    {
        return CryptogramPaymentTwoStepRequest::class;
    }

    protected function getExpectedUrl(): string
    {
        return 'https://api.cloudpayments.ru/payments/cards/auth';
    }
}
