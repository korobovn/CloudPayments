<?php

namespace Korobovn\Tests\Message\Request\Model;

use Korobovn\CloudPayments\Message\Request\Model\TokenPaymentModel;
use PHPUnit\Framework\TestCase;

class TokenPaymentModelTest extends TestCase
{
    public function testCreateWithRequiredFields(): void
    {
        (new TokenPaymentModel)
            ->setAmount(10)
            ->setCurrency('RUB')
            ->setAccountId('account_id')
            ->setInvoiceId('');

        $this->assertTrue(true);
    }

    public function testCreateWithAllFields(): void
    {
        (new TokenPaymentModel)
            ->setAmount(10)
            ->setCurrency('RUB')
            ->setAccountId('account_id')
            ->setInvoiceId('')
            ->setDescription('test description')
            ->setIpAddress('127.0.0.1')
            ->setEmail('127.0.0.1')
            ->setJsonData('');

        $this->assertTrue(true);
    }
}
