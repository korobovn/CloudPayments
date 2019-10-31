<?php

namespace Korobovn\Tests\Message\Strategy;

use Korobovn\CloudPayments\Message\Request\CryptogramPaymentAuthRequest;
use Korobovn\CloudPayments\Message\Request\Model\CryptogramPaymentModel;
use Korobovn\CloudPayments\Message\Strategy\CryptogramPaymentAuthStrategy;

class CryptogramPaymentAuthStrategyTest extends CryptogramPaymentOnestepStrategyTest
{
    /** @var CryptogramPaymentAuthStrategy */
    protected $strategy;

    /**
     * @inheritdoc
     */
    public function setUp(): void
    {
        $this->strategy = new CryptogramPaymentAuthStrategy(new CryptogramPaymentAuthRequest(
            new CryptogramPaymentModel(
                10,
                'RUB',
                '127.0.0.1',
                'CARDHOLDER NAME',
                '01492500008719030128SMfLeYdKp5dSQVIiO5l6ZCJiPdel4uDjdFTTz1UnXY',
                'invoice_id',
                'Оплата товаров в example.com',
                'account_id'
            )
        ));
    }
}
