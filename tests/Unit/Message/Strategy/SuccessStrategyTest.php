<?php

declare(strict_types = 1);

namespace Korobovn\Tests\Unit\Message\Strategy;

use PHPUnit\Framework\TestCase;
use Korobovn\CloudPayments\Message\Response\Model\NullModel;
use Korobovn\CloudPayments\Message\Response\SuccessResponse;
use Korobovn\CloudPayments\Message\Strategy\SuccessStrategy;

/**
 * @group unit
 * @coversNothing
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
