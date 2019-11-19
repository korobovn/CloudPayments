<?php

namespace Korobovn\Tests\Unit\Message\Request;

use Korobovn\CloudPayments\Message\Request\UpdateSubscriptionRequest;

/**
 * @group  unit
 * @group  update-subscription-request
 * @covers \Korobovn\CloudPayments\Message\Request\UpdateSubscriptionRequest
 */
class UpdateSubscriptionRequestTest extends BaseRequestTest
{
    protected function getTestClassName(): string
    {
        return UpdateSubscriptionRequest::class;
    }

    protected function getExpectedUrl(): string
    {
        return 'https://api.cloudpayments.ru/subscriptions/update';
    }
}
