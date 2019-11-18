<?php

namespace Korobovn\Tests\Unit\Message\Request\Model;

use PHPUnit\Framework\TestCase;
use Korobovn\CloudPayments\Message\Request\Model\CompletionOf3dSecureModel;

/**
 * @see   https://developers.cloudpayments.ru/#obrabotka-3-d-secure
 * @group unit
 * @coversNothing
 */
class CompletionOf3dSecureModelTest extends TestCase
{
    public function test(): void
    {
        (new CompletionOf3dSecureModel)
            ->setTransactionId(504)
            ->setPaRes('dsdsdsd');
        $this->assertTrue(true);
    }
}
