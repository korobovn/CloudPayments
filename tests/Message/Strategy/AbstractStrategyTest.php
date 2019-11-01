<?php

namespace Korobovn\Tests\Message\Strategy;

use Korobovn\CloudPayments\Message\Response\InvalidRequestResponse;
use Korobovn\CloudPayments\Message\Strategy\StrategyInterface;
use PHPUnit\Framework\TestCase;

abstract class AbstractStrategyTest extends TestCase
{
    /** @var StrategyInterface */
    protected $strategy;

    public function testInvalidRequestResponse(): void
    {
        $raw_response = [
            'Success' => false,
            'Message' => 'InvalidRequestResponse',
        ];

        $response = $this->strategy->prepareRawResponse($raw_response);

        $this->assertTrue($response instanceof InvalidRequestResponse);
        $this->assertSame('InvalidRequestResponse', $response->getMessage());
        $this->assertSame(false, $response->isSuccess());
    }
}
