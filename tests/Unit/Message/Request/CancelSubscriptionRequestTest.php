<?php

namespace Korobovn\Tests\Unit\Message\Request;

use Korobovn\CloudPayments\Message\Request\CancelSubscriptionRequest;

/**
 * @group  unit
 * @group  cancel-subscription-request
 * @covers \Korobovn\CloudPayments\Message\Request\CancelSubscriptionRequest
 */
class CancelSubscriptionRequestTest extends BaseRequestTest
{
    protected function getTestClassName(): string
    {
        return CancelSubscriptionRequest::class;
    }

    protected function getExpectedUrl(): string
    {
        return 'https://api.cloudpayments.ru/subscriptions/cancel';
    }
}
