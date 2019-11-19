<?php

namespace Korobovn\Tests\Unit\Message\Request\Model;

use PHPUnit\Framework\TestCase;
use Korobovn\CloudPayments\Message\Request\Model\TokenPaymentModel;

/**
 * @see   https://developers.cloudpayments.ru/#oplata-po-tokenu-rekarring
 * @group unit
 * @coversDefaultClass \Korobovn\CloudPayments\Message\Request\Model\TokenPaymentModel
 */
class TokenPaymentModelTest extends TestCase
{
    public function test(): void
    {
        $model = (new TokenPaymentModel)
            ->setAmount(10.0)
            ->setCurrency('RUB')
            ->setAccountId('account_id')
            ->setInvoiceId('1234567')
            ->setDescription('Test Description')
            ->setIpAddress('127.0.0.1')
            ->setEmail('mail@mail.com')
            ->setJsonData('');

        $this->assertSame(10.0, $model->getAmount());
        $this->assertSame('RUB', $model->getCurrency());
        $this->assertSame('127.0.0.1', $model->getIpAddress());
        $this->assertSame('1234567', $model->getInvoiceId());
        $this->assertSame('Test Description', $model->getDescription());
        $this->assertSame('account_id', $model->getAccountId());
        $this->assertSame('mail@mail.com', $model->getEmail());
        $this->assertSame('', $model->getJsonData());
    }
}
