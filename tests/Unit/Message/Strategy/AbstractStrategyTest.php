<?php

namespace Korobovn\Tests\Unit\Message\Strategy;

use PHPUnit\Framework\TestCase;
use Korobovn\CloudPayments\Message\Strategy\StrategyInterface;
use Korobovn\CloudPayments\Message\Response\InvalidRequestResponse;

/**
 * @group unit
 * @coversNothing
 */
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
        $this->assertFalse($response->isSuccess());
    }
}
