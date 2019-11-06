<?php

namespace Korobovn\Tests\Feature;

use Korobovn\CloudPayments\Message\Request\CompletionOf3dSecureRequest;
use Korobovn\CloudPayments\Message\Response\CryptogramTransactionAcceptedResponse;
use Korobovn\CloudPayments\Message\Response\CryptogramTransactionRejectedResponse;
use Korobovn\CloudPayments\Message\Response\InvalidRequestResponse;

/**
 * @group feature
 * @group completion-of-3d-secure
 *
 * @see https://developers.cloudpayments.ru/#obrabotka-3-d-secure
 */
class CompletionOf3dSecureTest extends AbstractFeatureTest
{
    public function test(): void
    {
        $request = new CompletionOf3dSecureRequest;
        $request->getModel()
            ->setTransactionId(504)
            ->setPaRes('RXDe9mLgo0Z1nhpU9PQasWmPhLYAKksuEChfn13uVR9mGTO7MzZM2dg3qSn0Q');

        $response = $this->client->send($request);

        if ($response instanceof CryptogramTransactionAcceptedResponse) {
            $this->assertTrue(true);
        } elseif ($response instanceof CryptogramTransactionRejectedResponse) {
            $this->assertTrue(true);
        } elseif ($response instanceof InvalidRequestResponse) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
}
