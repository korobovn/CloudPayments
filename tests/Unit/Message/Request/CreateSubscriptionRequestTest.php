<?php

namespace Korobovn\Tests\Unit\Message\Request;

use Korobovn\CloudPayments\Message\Request\CreateSubscriptionRequest;

/**
 * @group  unit
 * @group  create-subscription-request
 * @covers \Korobovn\CloudPayments\Message\Request\CreateSubscriptionRequest
 */
class CreateSubscriptionRequestTest extends BaseRequestTest
{
    protected function getTestClassName(): string
    {
        return CreateSubscriptionRequest::class;
    }

    protected function getExpectedUrl(): string
    {
        return 'https://api.cloudpayments.ru/subscriptions/create';
    }
}
