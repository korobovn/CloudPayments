<?php

namespace Korobovn\Tests\Unit\Message\Request\Model;

use PHPUnit\Framework\TestCase;
use Korobovn\CloudPayments\Message\Request\Model\CryptogramPaymentModel;

/**
 * @group request-model
 * @group unit
 */
class CryptogramPaymentModelTest extends TestCase
{
    public function testCreateWithRequiredFields(): void
    {
        (new CryptogramPaymentModel)
            ->setAmount(10)
            ->setCurrency('RUB')
            ->setIpAddress('127.0.0.1')
            ->setName('Ivanov Ivan')
            ->setInvoiceId('1234567');

        $this->assertTrue(true);
    }

    public function testCreateWithAllFields(): void
    {
        (new CryptogramPaymentModel)
            ->setAmount(10)
            ->setCurrency('RUB')
            ->setIpAddress('127.0.0.1')
            ->setName('Ivanov Ivan')
            ->setInvoiceId('1234567')
            ->setDescription('Test Description')
            ->setAccountId('account_id')
            ->setEmail('mail@mail.com')
            ->setJsonData('');

        $this->assertTrue(true);
    }
}
