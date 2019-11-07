<?php

namespace Korobovn\Tests\Feature;

use Korobovn\CloudPayments\Message\Request\TestRequest;
use Korobovn\CloudPayments\Message\Response\SuccessResponse;

/**
 * @group feature
 * @group test
 *
 * @see   https://developers.cloudpayments.ru/#testovyy-metod
 */
class TestTest extends AbstractFeatureTest
{
    public function test(): void
    {
        $request = new TestRequest;

        $response = $this->client->send($request);

        $this->assertInstanceOf(SuccessResponse::class, $response);
    }
}
