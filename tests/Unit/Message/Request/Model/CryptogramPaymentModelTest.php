<?php

namespace Korobovn\Tests\Unit\Message\Request\Model;

use PHPUnit\Framework\TestCase;
use Korobovn\CloudPayments\Message\Request\Model\CryptogramPaymentModel;

/**
 * @group request-model
 * @group unit
 * @coversDefaultClass \Korobovn\CloudPayments\Message\Request\Model\CryptogramPaymentModel
 */
class CryptogramPaymentModelTest extends TestCase
{
    public function test(): void
    {
        $model = (new CryptogramPaymentModel)
            ->setAmount(10.0)
            ->setCurrency('RUB')
            ->setIpAddress('127.0.0.1')
            ->setName('Ivanov Ivan')
            ->setInvoiceId('1234567')
            ->setDescription('Test Description')
            ->setAccountId('account_id')
            ->setEmail('mail@mail.com')
            ->setJsonData('');

        $this->assertSame(10.0, $model->getAmount());
        $this->assertSame('RUB', $model->getCurrency());
        $this->assertSame('127.0.0.1', $model->getIpAddress());
        $this->assertSame('Ivanov Ivan', $model->getName());
        $this->assertSame('1234567', $model->getInvoiceId());
        $this->assertSame('Test Description', $model->getDescription());
        $this->assertSame('account_id', $model->getAccountId());
        $this->assertSame('mail@mail.com', $model->getEmail());
        $this->assertSame('', $model->getJsonData());
    }
}
