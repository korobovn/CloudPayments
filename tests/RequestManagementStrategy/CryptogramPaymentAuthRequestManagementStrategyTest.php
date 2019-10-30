<?php

namespace Korobovn\Tests\RequestManagementStrategy;

use Korobovn\CloudPayments\Request\CryptogramPaymentAuthRequest;
use Korobovn\CloudPayments\Request\Model\CryptogramPaymentModel;
use Korobovn\CloudPayments\RequestManagementStrategy\CryptogramPaymentAuthRequestRequestManagementStrategy;

class CryptogramPaymentAuthRequestManagementStrategyTest extends CryptogramPaymentOnestepRequestManagementStrategyTest
{
    /** @var CryptogramPaymentAuthRequestRequestManagementStrategy */
    protected $strategy;

    /**
     * @inheritdoc
     */
    public function setUp(): void
    {
        $this->strategy = new CryptogramPaymentAuthRequestRequestManagementStrategy(new CryptogramPaymentAuthRequest(
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
