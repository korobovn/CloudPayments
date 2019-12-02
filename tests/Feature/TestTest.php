<?php

declare(strict_types = 1);

namespace Korobovn\Tests\Feature;

use Korobovn\CloudPayments\Message\Request\TestRequest;
use Korobovn\CloudPayments\Message\Response\SuccessResponse;

/**
 * @group feature
 * @group test
 *
 * @see   https://developers.cloudpayments.ru/#testovyy-metod
 * @coversNothing
 */
class TestTest extends AbstractFeatureTest
{
    public function test(): void
    {
        $request = TestRequest::create();

        $response = $this->client->send($request);

        $this->assertInstanceOf(SuccessResponse::class, $response);
    }
}
