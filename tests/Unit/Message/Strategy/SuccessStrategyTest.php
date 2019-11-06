<?php

namespace Korobovn\Tests\Unit\Message\Strategy;

use Korobovn\CloudPayments\Message\Response\Model\NullModel;
use Korobovn\CloudPayments\Message\Response\SuccessResponse;
use Korobovn\CloudPayments\Message\Strategy\SuccessStrategy;
use PHPUnit\Framework\TestCase;

/**
 * @group unit
 */
class SuccessStrategyTest extends TestCase
{
    public function test(): void
    {
        $strategy = new SuccessStrategy;

        $raw_response = [
            'Success' => true,
            'Message' => 'bd6353c3-0ed6-4a65-946f-083664bf8dbd',
        ];

        $response = $strategy->prepareRawResponse($raw_response);

        $this->assertTrue($response instanceof SuccessResponse);
        $this->assertTrue($response->getModel() instanceof NullModel);
        $this->assertTrue($response->isSuccess());
        $this->assertSame('bd6353c3-0ed6-4a65-946f-083664bf8dbd', $response->getMessage());
    }
}
