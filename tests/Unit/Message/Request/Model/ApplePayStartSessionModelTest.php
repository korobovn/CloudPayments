<?php

namespace Korobovn\Tests\Unit\Message\Request\Model;

use Korobovn\CloudPayments\Message\Request\Model\ApplePayStartSessionModel;
use PHPUnit\Framework\TestCase;

/**
 * @see   https://developers.cloudpayments.ru/#zapusk-sessii-dlya-oplaty-cherez-apple-pay
 * @group unit
 * @coversDefaultClass \Korobovn\CloudPayments\Message\Request\Model\ApplePayStartSessionModel
 */
class ApplePayStartSessionModelTest extends TestCase
{
    public function test(): void
    {
        $model = (new ApplePayStartSessionModel)
            ->setValidationUrl('https://apple-pay-gateway.apple.com/paymentservices/startSession');

        $this->assertSame('https://apple-pay-gateway.apple.com/paymentservices/startSession',
            $model->getValidationUrl());
    }
}
