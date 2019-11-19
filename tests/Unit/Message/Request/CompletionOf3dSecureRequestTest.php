<?php

namespace Korobovn\Tests\Unit\Message\Request;

use Korobovn\CloudPayments\Message\Request\CompletionOf3dSecureRequest;

/**
 * @group  unit
 * @group  completion-of-3d-secure-request
 * @covers \Korobovn\CloudPayments\Message\Request\CompletionOf3dSecureRequest
 */
class CompletionOf3dSecureRequestTest extends BaseRequestTest
{
    protected function getTestClassName(): string
    {
        return CompletionOf3dSecureRequest::class;
    }

    protected function getExpectedUrl(): string
    {
        return 'https://api.cloudpayments.ru/payments/cards/post3ds';
    }
}
