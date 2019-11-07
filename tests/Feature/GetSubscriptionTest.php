<?php

namespace Korobovn\Tests\Feature;

use Korobovn\CloudPayments\Message\Request\GetSubscriptionRequest;
use Korobovn\CloudPayments\Message\Response\SubscriptionResponse;

/**
 * @group feature
 * @group get-subscription
 *
 * @see   https://developers.cloudpayments.ru/#zapros-informatsii-o-podpiske
 */
class GetSubscriptionTest extends CreateSubscriptionTest
{
    /**
     * The test depends on testCreateSubscription. The first step is to create a subscription.
     * 
     * @param string $subscription_id
     *
     * @depends testCreateSubscription
     */
    public function testGetSubscription(string $subscription_id): void
    {
        $request = new GetSubscriptionRequest;
        $request->getModel()
            ->setId($subscription_id);

        /** @var SubscriptionResponse $response */
        $response = $this->client->send($request);

        $this->assertInstanceOf(SubscriptionResponse::class, $response);
    }
}
