<?php

namespace Korobovn\Tests\Feature;

use Korobovn\CloudPayments\Message\Request\FindSubscriptionRequest;
use Korobovn\CloudPayments\Message\Response\InvalidRequestResponse;
use Korobovn\CloudPayments\Message\Response\SubscriptionsResponse;

/**
 * @group feature
 * @group find-subscription
 *
 * @see https://developers.cloudpayments.ru/#poisk-podpisok
 */
class FindSubscriptionTest extends AbstractFeatureTest
{
    public function test(): void
    {
        $request = new FindSubscriptionRequest;
        $request->getModel()
            ->setAccountId('user@example.com');

        $response = $this->client->send($request);

        if ($response instanceof SubscriptionsResponse) {
            $this->assertTrue(true);
            foreach ($response->getModel() as $subscription) {
                $this->assertTrue(! empty($subscription->getId()));
            }
        } elseif ($response instanceof InvalidRequestResponse) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
}
