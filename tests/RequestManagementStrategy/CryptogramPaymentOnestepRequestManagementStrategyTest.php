<?php

namespace Korobovn\Tests\RequestManagementStrategy;

use Korobovn\CloudPayments\Request\CryptogramPaymentOnestepRequest;
use Korobovn\CloudPayments\Request\Model\CryptogramPaymentModel;
use Korobovn\CloudPayments\RequestManagementStrategy\CryptogramPaymentOnestepRequestManagementStrategy;
use Korobovn\CloudPayments\Response\InvalidRequestResponse;
use Korobovn\CloudPayments\Response\Cryptogram3dSecureAuthRequiredResponse;
use Korobovn\CloudPayments\Response\CryptogramTransactionAcceptedResponse;
use Korobovn\CloudPayments\Response\CryptogramTransactionRejectedResponse;
use PHPUnit\Framework\TestCase;

class CryptogramPaymentOnestepRequestManagementStrategyTest extends TestCase
{
    /** @var CryptogramPaymentOnestepRequestManagementStrategy */
    protected $strategy;

    /**
     * @inheritdoc
     */
    public function setUp(): void
    {
        $this->strategy = new CryptogramPaymentOnestepRequestManagementStrategy(new CryptogramPaymentOnestepRequest(
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

    public function testPrepareInvalidRequestResponse(): void
    {
        $raw_response = [
            'Success' => false,
            'Message' => 'Amount is required',
        ];

        $response = $this->strategy->prepareRawResponse($raw_response);

        $this->assertTrue($response instanceof InvalidRequestResponse);
        $this->assertSame('Amount is required', $response->getMessage());
        $this->assertSame(false, $response->isSuccess());
    }

    public function testPrepareCryptogram3dSecureAuthRequiredResponse(): void
    {
        $raw_response = [
            'Model'   => [
                'TransactionId' => 504,
                'PaReq'         => 'RXDe9mLgo0Z1nhpU9PQasWmPhLYAKksuEChfn13uVR9mGTO7MzZM2dg3qSn0Q',
                'AcsUrl'        => 'https://test.paymentgate.ru/acs/auth/start.do',
            ],
            'Success' => false,
            'Message' => null,
        ];

        $response = $this->strategy->prepareRawResponse($raw_response);

        $this->assertTrue($response instanceof Cryptogram3dSecureAuthRequiredResponse);
        $this->assertSame(false, $response->isSuccess());
        $this->assertSame($raw_response['Model'], $response->getModel()->toArray());

        if ($response instanceof Cryptogram3dSecureAuthRequiredResponse) {
            $this->assertSame(504, $response->getModel()->getTransactionId());
        }
    }

    public function testPrepareTransactionRejectedResponse(): void
    {
        $raw_response = [
            'Model'   => [
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
            ],
            'Success' => false,
            'Message' => null,
        ];

        $response = $this->strategy->prepareRawResponse($raw_response);

        $this->assertTrue($response instanceof CryptogramTransactionRejectedResponse);
        $this->assertSame(false, $response->isSuccess());
        $this->assertSame($raw_response['Model'], $response->getModel()->toArray());
        if ($response instanceof CryptogramTransactionRejectedResponse) {
            $this->assertSame(5051, $response->getModel()->getReasonCode());
        }
    }

    public function testPrepareTransactionAcceptedResponse(): void
    {
        $raw_response = [
            'Model'   => [
                'TransactionId'     => 504,
                'Amount'            => 10.00000,
                'Currency'          => 'RUB',
                'CurrencyCode'      => 0,
                'InvoiceId'         => '1234567',
                'AccountId'         => 'user_x',
                'Email'             => null,
                'Description'       => 'Оплата товаров в example.com',
                'JsonData'          => null,
                'CreatedDate'       => '\/Date(1401718880000)\/',
                'CreatedDateIso'    => '2014-08-09T11:49:41', //все даты в UTC
                'AuthDate'          => '\/Date(1401733880523)\/',
                'AuthDateIso'       => '2014-08-09T11:49:42',
                'ConfirmDate'       => '\/Date(1401733880523)\/',
                'ConfirmDateIso'    => '2014-08-09T11:49:42',
                'AuthCode'          => '123456',
                'TestMode'          => true,
                'IpAddress'         => '195.91.194.13',
                'IpCountry'         => 'RU',
                'IpCity'            => 'Уфа',
                'IpRegion'          => 'Республика Башкортостан',
                'IpDistrict'        => 'Приволжский федеральный округ',
                'IpLatitude'        => 54.7355,
                'IpLongitude'       => 55.991982,
                'CardFirstSix'      => '411111',
                'CardLastFour'      => '1111',
                'CardExpDate'       => '05/19',
                'CardType'          => 'Visa',
                'CardTypeCode'      => 0,
                'Issuer'            => 'Sberbank of Russia',
                'IssuerBankCountry' => 'RU',
                'Status'            => 'Completed',
                'StatusCode'        => 3,
                'Reason'            => 'Approved',
                'ReasonCode'        => 0,
                'CardHolderMessage' => 'Оплата успешно проведена', //сообщение для покупателя
                'Name'              => 'CARDHOLDER NAME',
                'Token'             => 'a4e67841-abb0-42de-a364-d1d8f9f4b3c0',
            ],
            'Success' => true,
            'Message' => null,
        ];

        $response = $this->strategy->prepareRawResponse($raw_response);

        $this->assertTrue($response instanceof CryptogramTransactionAcceptedResponse);
        $this->assertSame(true, $response->isSuccess());
        $this->assertSame($raw_response['Model'], $response->getModel()->toArray());
        if ($response instanceof CryptogramTransactionAcceptedResponse) {
            $this->assertSame(3, $response->getModel()->getStatusCode());
        }
    }
}
