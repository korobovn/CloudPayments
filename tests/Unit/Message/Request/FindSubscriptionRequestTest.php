<?php

namespace Korobovn\Tests\Unit\Message\Request;

use Korobovn\CloudPayments\Message\Request\FindSubscriptionRequest;

/**
 * @group  unit
 * @group  find-subscription-request
 * @covers \Korobovn\CloudPayments\Message\Request\FindSubscriptionRequest
 */
class FindSubscriptionRequestTest extends BaseRequestTest
{
    protected function getTestClassName(): string
    {
        return FindSubscriptionRequest::class;
    }

    protected function getExpectedUrl(): string
    {
        return 'https://api.cloudpayments.ru/subscriptions/find';
    }
}
