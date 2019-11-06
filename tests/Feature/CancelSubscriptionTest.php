<?php

namespace Korobovn\Tests\Feature;

use Korobovn\CloudPayments\Message\Request\CancelSubscriptionRequest;
use Korobovn\CloudPayments\Message\Response\InvalidRequestResponse;
use Korobovn\CloudPayments\Message\Response\SuccessResponse;

/**
 * @group feature
 * @group cancel-subscription
 *
 * @see https://developers.cloudpayments.ru/#otmena-podpiski-na-rekurrentnye-platezhi
 */
class CancelGetSubscriptionTest extends AbstractFeatureTest
{
    public function test(): void
    {
        $request = new CancelSubscriptionRequest;
        $request->getModel()
            ->setId('sc_8cf8a9338fb8ebf7202b08d09c938');

        $response = $this->client->send($request);

        if ($response instanceof SuccessResponse) {
            $this->assertTrue(true);
        } elseif ($response instanceof InvalidRequestResponse) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
}
