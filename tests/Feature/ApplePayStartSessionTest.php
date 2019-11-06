<?php

namespace Korobovn\Tests\Feature;

use Korobovn\CloudPayments\Message\Request\ApplePayStartSessionRequest;
use Korobovn\CloudPayments\Message\Response\ApplePayStartSessionResponse;
use Korobovn\CloudPayments\Message\Response\InvalidRequestResponse;

/**
 * @group feature
 * @group apple-pay-start-session
 *
 * @see https://developers.cloudpayments.ru/#zapusk-sessii-dlya-oplaty-cherez-apple-pay
 */
class ApplePayStartSessionTest extends AbstractFeatureTest
{
    public function test(): void
    {
        $request = new ApplePayStartSessionRequest;
        $request->getModel()
            ->setValidationUrl('https://apple-pay-gateway.apple.com/paymentservices/startSession');

        $response = $this->client->send($request);

        if ($response instanceof ApplePayStartSessionResponse) {
            $this->assertTrue(true);
        } elseif ($response instanceof InvalidRequestResponse) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
}
