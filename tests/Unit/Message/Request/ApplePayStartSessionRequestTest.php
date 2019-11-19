<?php

namespace Korobovn\Tests\Unit\Message\Request;

use Korobovn\CloudPayments\Message\Request\ApplePayStartSessionRequest;

/**
 * @group  unit
 * @group  apple-pay-start-session-request
 * @covers \Korobovn\CloudPayments\Message\Request\ApplePayStartSessionRequest
 */
class ApplePayStartSessionRequestTest extends BaseRequestTest
{
    protected function getTestClassName(): string
    {
        return ApplePayStartSessionRequest::class;
    }

    protected function getExpectedUrl(): string
    {
        return 'https://api.cloudpayments.ru/applepay/startsession';
    }
}
