<?php

namespace Korobovn\Tests\Feature;

use Korobovn\CloudPayments\Message\Response\SuccessResponse;
use Korobovn\CloudPayments\Message\Request\CancelSubscriptionRequest;

/**
 * @group feature
 * @group cancel-subscription
 *
 * @see   https://developers.cloudpayments.ru/#otmena-podpiski-na-rekurrentnye-platezhi
 * @coversNothing
 */
class CancelGetSubscriptionTest extends CreateSubscriptionTest
{
    /**
     * The test depends on testCreateSubscription. The first step is to create a subscription.
     *
     * @param string $subscription_id
     *
     * @depends testCreateSubscription
     */
    public function testCancelGetSubscription($subscription_id): void
    {
        $request = new CancelSubscriptionRequest;
        $request->getModel()
            ->setId($subscription_id);

        /** @var SuccessResponse $response */
        $response = $this->client->send($request);

        $this->assertInstanceOf(SuccessResponse::class, $response);
    }
}
