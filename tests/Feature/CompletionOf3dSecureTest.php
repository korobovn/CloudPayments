<?php

declare(strict_types = 1);

namespace Korobovn\Tests\Feature;

use Korobovn\CloudPayments\Message\Request\CompletionOf3dSecureRequest;
use Korobovn\CloudPayments\Message\Response\CryptogramTransactionRejectedResponse;

/**
 * @group feature
 * @group completion-of-3d-secure
 *
 * @see   https://developers.cloudpayments.ru/#obrabotka-3-d-secure
 * @coversNothing
 */
class CompletionOf3dSecureTest extends AbstractFeatureTest
{
    public function test(): void
    {
        $request = CompletionOf3dSecureRequest::create();
        $request->getModel()
            ->setTransactionId(504)
            ->setPaRes('534534');

        $response = $this->client->send($request);

        $this->assertInstanceOf(CryptogramTransactionRejectedResponse::class, $response);
    }
}
