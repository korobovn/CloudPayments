<?php

namespace Korobovn\Tests\Unit\Message\Request\Model;

use PHPUnit\Framework\TestCase;
use Korobovn\CloudPayments\Message\Request\Model\CompletionOf3dSecureModel;

/**
 * @see   https://developers.cloudpayments.ru/#obrabotka-3-d-secure
 * @group unit
 * @coversDefaultClass \Korobovn\CloudPayments\Message\Request\Model\CompletionOf3dSecureModel
 */
class CompletionOf3dSecureModelTest extends TestCase
{
    public function test(): void
    {
        $model = (new CompletionOf3dSecureModel)
            ->setTransactionId(504)
            ->setPaRes('RXDe9mLgo0Z1nhpU9PQasWmPhLYAKksuEChfn13uVR9mGTO7MzZM2dg3qSn0Q');

        $this->assertSame(504, $model->getTransactionId());
        $this->assertSame('RXDe9mLgo0Z1nhpU9PQasWmPhLYAKksuEChfn13uVR9mGTO7MzZM2dg3qSn0Q', $model->getPaRes());
    }
}
