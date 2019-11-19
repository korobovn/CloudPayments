<?php

namespace Korobovn\Tests\Unit\Message\Request;

use Korobovn\CloudPayments\Message\Request\TokenPaymentOneStepRequest;

/**
 * @group  unit
 * @group  token-payment-one-step-request
 * @covers \Korobovn\CloudPayments\Message\Request\TokenPaymentOneStepRequest
 */
class TokenPaymentOneStepRequestTest extends BaseRequestTest
{
    protected function getTestClassName(): string
    {
        return TokenPaymentOneStepRequest::class;
    }

    protected function getExpectedUrl(): string
    {
        return 'https://api.cloudpayments.ru/payments/tokens/charge';
    }
}
