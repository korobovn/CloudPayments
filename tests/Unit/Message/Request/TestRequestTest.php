<?php

namespace Korobovn\Tests\Unit\Message\Request;

use Korobovn\CloudPayments\Message\Request\TestRequest;

/**
 * @group  unit
 * @group  test-request
 * @covers \Korobovn\CloudPayments\Message\Request\TestRequest
 */
class TestRequestTest extends BaseRequestTest
{
    protected function getTestClassName(): string
    {
        return TestRequest::class;
    }

    protected function getExpectedUrl(): string
    {
        return 'https://api.cloudpayments.ru/test';
    }
}
