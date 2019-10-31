<?php

namespace Korobovn\Tests\Message\Request\Model;

use Korobovn\CloudPayments\Message\Request\Model\TokenPaymentModel;
use PHPUnit\Framework\TestCase;

class TokenPaymentModelTest extends TestCase
{
    public function testCreateWithRequiredFields(): void
    {
        new TokenPaymentModel(
            10,
            'RUB',
            'account_id',
            '123456'
        );

        $this->assertTrue(true);
    }

    public function testCreateWithAllFields(): void
    {
        new TokenPaymentModel(
            10,
            'RUB',
            'account_id',
            '123456',
            '12345678',
            'test description',
            '127.0.0.1',
            'mail@mail.com',
            ''
        );

        $this->assertTrue(true);
    }
}
