<?php

namespace Korobovn\Tests\Unit\Message\Request\Model;

use Korobovn\CloudPayments\Message\Request\Model\CompletionOf3dSecureModel;
use PHPUnit\Framework\TestCase;

/**
 * @see   https://developers.cloudpayments.ru/#obrabotka-3-d-secure
 * @group unit
 */
class CompletionOf3dSecureModelTest extends TestCase
{
    public function test()
    {
        (new CompletionOf3dSecureModel)
            ->setTransactionId(504)
            ->setPaRes('dsdsdsd');
        $this->assertTrue(true);
    }
}
