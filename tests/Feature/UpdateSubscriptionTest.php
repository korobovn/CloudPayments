<?php

namespace Korobovn\Tests\Feature;

use Korobovn\CloudPayments\Message\Request\UpdateSubscriptionRequest;
use Korobovn\CloudPayments\Message\Response\InvalidRequestResponse;
use Korobovn\CloudPayments\Message\Response\SubscriptionResponse;

/**
 * @group feature
 * @group update-subscription
 *
 * @see https://developers.cloudpayments.ru/#izmenenie-podpiski-na-rekurrentnye-platezhi
 */
class UpdateSubscriptionTest extends AbstractFeatureTest
{
    public function test(): void
    {
        $request = new UpdateSubscriptionRequest;
        $request->getModel()
            ->setId('sc_8cf8a9338fb8ebf7202b08d09c938')
            ->setDescription('Тариф №5')
            ->setAmount(1200)
            ->setCurrency('RUB');

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
