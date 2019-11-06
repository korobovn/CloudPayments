<?php

namespace Korobovn\Tests\Feature;

use Korobovn\CloudPayments\Message\Request\GetSubscriptionRequest;
use Korobovn\CloudPayments\Message\Response\InvalidRequestResponse;
use Korobovn\CloudPayments\Message\Response\SubscriptionResponse;

/**
 * @group feature
 * @group get-subscription
 *
 * @see https://developers.cloudpayments.ru/#zapros-informatsii-o-podpiske
 */
class GetSubscriptionTest extends AbstractFeatureTest
{
    public function test(): void
    {
        $request = new GetSubscriptionRequest;
        $request->getModel()
            ->setId('sc_8cf8a9338fb8ebf7202b08d09c938');

        $response = $this->client->send($request);

        if ($response instanceof SubscriptionResponse) {
            $this->assertTrue(true);
        } elseif ($response instanceof InvalidRequestResponse) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
}
