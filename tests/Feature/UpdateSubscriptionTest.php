<?php

namespace Korobovn\Tests\Feature;

use Korobovn\CloudPayments\Message\Request\UpdateSubscriptionRequest;
use Korobovn\CloudPayments\Message\Response\SubscriptionResponse;

/**
 * @group feature
 * @group update-subscription
 *
 * @see   https://developers.cloudpayments.ru/#izmenenie-podpiski-na-rekurrentnye-platezhi
 */
class UpdateSubscriptionTest extends CreateSubscriptionTest
{
    /**
     * The test depends on testCreateSubscription. The first step is to create a subscription.
     *
     * @param string $subscription_id
     *
     * @depends testCreateSubscription
     */
    public function testUpdateSubscription($subscription_id): void
    {
        $request = new UpdateSubscriptionRequest;
        $request->getModel()
            ->setId($subscription_id)
            ->setDescription('new price')
            ->setAmount(1200);

        /** @var SubscriptionResponse $response */
        $response = $this->client->send($request);

        $this->assertInstanceOf(SubscriptionResponse::class, $response);
    }
}
