<?php

namespace Korobovn\Tests\Unit\Message\Request;

use Korobovn\CloudPayments\Message\Request\GetSubscriptionRequest;

/**
 * @group  unit
 * @group  get-subscription-request
 * @covers \Korobovn\CloudPayments\Message\Request\GetSubscriptionRequest
 */
class GetSubscriptionRequestTest extends BaseRequestTest
{
    protected function getTestClassName(): string
    {
        return GetSubscriptionRequest::class;
    }

    protected function getExpectedUrl(): string
    {
        return 'https://api.cloudpayments.ru/subscriptions/get';
    }
}
