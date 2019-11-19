<?php

namespace Korobovn\Tests\Unit\Message\Request;

use Korobovn\CloudPayments\Message\Request\TokenPaymentTwoStepRequest;

/**
 * @group  unit
 * @group  token-payment-two-step-request
 * @covers \Korobovn\CloudPayments\Message\Request\TokenPaymentTwoStepRequest
 */
class TokenPaymentTwoStepRequestTest extends BaseRequestTest
{
    protected function getTestClassName(): string
    {
        return TokenPaymentTwoStepRequest::class;
    }

    protected function getExpectedUrl(): string
    {
        return 'https://api.cloudpayments.ru/payments/tokens/auth';
    }
}
