<?php

namespace Tests\Unit\Korobovn\Tests\Unit\Message\Traits;

use PHPUnit\Framework\TestCase;
use Korobovn\CloudPayments\Message\Response\Model\CryptogramTransactionRejectedModel;

/**
 * @group FillFromArrayTest
 * @coversNothing
 */
class FillFromArrayTest extends TestCase
{
    public function testBasicTest(): void
    {
        $raw = [
            'TransactionId'       => 504,
            'Amount'              => 10.00000,
            'Currency'            => 'RUB',
            'CurrencyCode'        => 0,
            'PaymentAmount'       => 10.00000,
            'PaymentCurrency'     => 'RUB',
            'PaymentCurrencyCode' => 0,
            'InvoiceId'           => '1234567',
            'AccountId'           => 'user_x',
            'Email'               => null,
            'Description'         => 'Оплата товаров в example.com',
            'JsonData'            => null,
            'CreatedDate'         => '\/Date(1401718880000)\/',
            'CreatedDateIso'      => '2014-08-09T11:49:41', //все даты в UTC
            'TestMode'            => true,
            'IpAddress'           => '195.91.194.13',
            'IpCountry'           => 'RU',
            'IpCity'              => 'Уфа',
            'IpRegion'            => 'Республика Башкортостан',
            'IpDistrict'          => 'Приволжский федеральный округ',
            'IpLatitude'          => 54.7355,
            'IpLongitude'         => 55.991982,
            'CardFirstSix'        => '411111',
            'CardLastFour'        => '1111',
            'CardExpDate'         => '05/19',
            'CardType'            => 'Visa',
            'CardTypeCode'        => 0,
            'Issuer'              => 'Sberbank of Russia',
            'IssuerBankCountry'   => 'RU',
            'Status'              => 'Declined',
            'StatusCode'          => 5,
            'Reason'              => 'InsufficientFunds', // причина отказа
            'ReasonCode'          => 5051, //код отказа
            'CardHolderMessage'   => 'Недостаточно средств на карте', //сообщение для покупателя
            'Name'                => 'CARDHOLDER NAME',
        ];

        $model = new CryptogramTransactionRejectedModel;
        $model->fillFromArray($raw);

        $this->assertSame($raw, $model->toArray());
    }
}
