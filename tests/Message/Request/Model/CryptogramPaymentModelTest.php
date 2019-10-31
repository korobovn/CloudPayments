<?php

namespace Korobovn\Tests\Message\Request\Model;

use Korobovn\CloudPayments\Message\Request\Model\CryptogramPaymentModel;
use PHPUnit\Framework\TestCase;

class CryptogramPaymentModelTest extends TestCase
{
    public function testCreateWithRequiredFields(): void
    {
        new CryptogramPaymentModel(
            10.0,
            'RUB',
            '127.0.0.1',
            'Ivanov Ivan',
            '1234567'
        );

        $this->assertTrue(true);
    }

    public function testCreateWithAllFields(): void
    {
        new CryptogramPaymentModel(
            10.0,
            'RUB',
            '127.0.0.1',
            'Ivanov Ivan',
            '1234567',
            'invoice_id',
            'Test Description',
            'account_id',
            'mail@mail.com',
            ''
        );

        $this->assertTrue(true);
    }
}
