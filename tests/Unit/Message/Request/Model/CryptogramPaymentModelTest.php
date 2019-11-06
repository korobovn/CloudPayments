<?php

namespace Korobovn\Tests\Unit\Message\Request\Model;

use Korobovn\CloudPayments\Message\Request\Model\CryptogramPaymentModel;
use PHPUnit\Framework\TestCase;

/**
 *
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
