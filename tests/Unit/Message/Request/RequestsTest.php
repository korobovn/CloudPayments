<?php

namespace Korobovn\Tests\Unit\Message\Request;

use Korobovn\CloudPayments\Message\Request\ApplePayStartSessionRequest;
use Korobovn\CloudPayments\Message\Request\CancelPaymentRequest;
use Korobovn\CloudPayments\Message\Request\CancelSubscriptionRequest;
use Korobovn\CloudPayments\Message\Request\CompletionOf3dSecureRequest;
use Korobovn\CloudPayments\Message\Request\CreateSubscriptionRequest;
use Korobovn\CloudPayments\Message\Request\CryptogramPaymentOneStepRequest;
use Korobovn\CloudPayments\Message\Request\CryptogramPaymentTwoStepRequest;
use Korobovn\CloudPayments\Message\Request\FindSubscriptionRequest;
use Korobovn\CloudPayments\Message\Request\GetSubscriptionRequest;
use Korobovn\CloudPayments\Message\Request\Model\ApplePayStartSessionModel;
use Korobovn\CloudPayments\Message\Request\Model\CancelPaymentModel;
use Korobovn\CloudPayments\Message\Request\Model\CancelSubscriptionModel;
use Korobovn\CloudPayments\Message\Request\Model\CompletionOf3dSecureModel;
use Korobovn\CloudPayments\Message\Request\Model\CreateSubscriptionModel;
use Korobovn\CloudPayments\Message\Request\Model\CryptogramPaymentModel;
use Korobovn\CloudPayments\Message\Request\Model\FindSubscriptionModel;
use Korobovn\CloudPayments\Message\Request\Model\GetSubscriptionModel;
use Korobovn\CloudPayments\Message\Request\Model\NullModel;
use Korobovn\CloudPayments\Message\Request\Model\RefundPaymentModel;
use Korobovn\CloudPayments\Message\Request\Model\TokenPaymentModel;
use Korobovn\CloudPayments\Message\Request\Model\UpdateSubscriptionModel;
use Korobovn\CloudPayments\Message\Request\RefundPaymentRequest;
use Korobovn\CloudPayments\Message\Request\RequestInterface;
use Korobovn\CloudPayments\Message\Request\TestRequest;
use Korobovn\CloudPayments\Message\Request\TokenPaymentOneStepRequest;
use Korobovn\CloudPayments\Message\Request\TokenPaymentTwoStepRequest;
use Korobovn\CloudPayments\Message\Request\UpdateSubscriptionRequest;
use PHPUnit\Framework\TestCase;

/**
 * @group  unit
 * @group  requests
 * @covers \Korobovn\CloudPayments\Message\Request\ApplePayStartSessionRequest
 * @covers \Korobovn\CloudPayments\Message\Request\CancelSubscriptionRequest
 * @covers \Korobovn\CloudPayments\Message\Request\CompletionOf3dSecureRequest
 * @covers \Korobovn\CloudPayments\Message\Request\CreateSubscriptionRequest
 * @covers \Korobovn\CloudPayments\Message\Request\CryptogramPaymentOneStepRequest
 * @covers \Korobovn\CloudPayments\Message\Request\CryptogramPaymentTwoStepRequest
 * @covers \Korobovn\CloudPayments\Message\Request\FindSubscriptionRequest
 * @covers \Korobovn\CloudPayments\Message\Request\GetSubscriptionRequest
 * @covers \Korobovn\CloudPayments\Message\Request\TestRequest
 * @covers \Korobovn\CloudPayments\Message\Request\TokenPaymentOneStepRequest
 * @covers \Korobovn\CloudPayments\Message\Request\TokenPaymentTwoStepRequest
 * @covers \Korobovn\CloudPayments\Message\Request\UpdateSubscriptionRequest
 * @covers \Korobovn\CloudPayments\Message\Request\CancelPaymentRequest
 * @covers \Korobovn\CloudPayments\Message\Request\RefundPaymentRequest
 *
 **/
class RequestsTest extends TestCase
{
    public function dataProvider()
    {
        return [
            ApplePayStartSessionRequest::class =>
                [
                    ApplePayStartSessionRequest::class,
                    ApplePayStartSessionModel::class,
                    'https://api.cloudpayments.ru/applepay/startsession',
                ],

            CancelSubscriptionRequest::class =>
                [
                    CancelSubscriptionRequest::class,
                    CancelSubscriptionModel::class,
                    'https://api.cloudpayments.ru/subscriptions/cancel',
                ],

            CompletionOf3dSecureRequest::class =>
                [
                    CompletionOf3dSecureRequest::class,
                    CompletionOf3dSecureModel::class,
                    'https://api.cloudpayments.ru/payments/cards/post3ds',
                ],

            CreateSubscriptionRequest::class =>
                [
                    CreateSubscriptionRequest::class,
                    CreateSubscriptionModel::class,
                    'https://api.cloudpayments.ru/subscriptions/create',
                ],

            CryptogramPaymentOneStepRequest::class =>
                [
                    CryptogramPaymentOneStepRequest::class,
                    CryptogramPaymentModel::class,
                    'https://api.cloudpayments.ru/payments/cards/charge',
                ],

            CryptogramPaymentTwoStepRequest::class =>
                [
                    CryptogramPaymentTwoStepRequest::class,
                    CryptogramPaymentModel::class,
                    'https://api.cloudpayments.ru/payments/cards/auth',
                ],

            FindSubscriptionRequest::class =>
                [
                    FindSubscriptionRequest::class,
                    FindSubscriptionModel::class,
                    'https://api.cloudpayments.ru/subscriptions/find',
                ],

            GetSubscriptionRequest::class =>
                [
                    GetSubscriptionRequest::class,
                    GetSubscriptionModel::class,
                    'https://api.cloudpayments.ru/subscriptions/get',
                ],

            TestRequest::class =>
                [
                    TestRequest::class,
                    NullModel::class,
                    'https://api.cloudpayments.ru/test',
                ],

            TokenPaymentOneStepRequest::class =>
                [
                    TokenPaymentOneStepRequest::class,
                    TokenPaymentModel::class,
                    'https://api.cloudpayments.ru/payments/tokens/charge',
                ],

            TokenPaymentTwoStepRequest::class =>
                [
                    TokenPaymentTwoStepRequest::class,
                    TokenPaymentModel::class,
                    'https://api.cloudpayments.ru/payments/tokens/auth',
                ],

            UpdateSubscriptionRequest::class =>
                [
                    UpdateSubscriptionRequest::class,
                    UpdateSubscriptionModel::class,
                    'https://api.cloudpayments.ru/subscriptions/update',
                ],
            CancelPaymentRequest::class      =>
                [
                    CancelPaymentRequest::class,
                    CancelPaymentModel::class,
                    'https://api.cloudpayments.ru/payments/void',
                ],
            RefundPaymentRequest::class      =>
                [
                    RefundPaymentRequest::class,
                    RefundPaymentModel::class,
                    'https://api.cloudpayments.ru/payments/refund',
                ],
        ];
    }

    /**
     * @dataProvider dataProvider
     *
     * @param string $request_class_name
     * @param string $model_class_name
     * @param string $url
     */
    public function testGetUrl(string $request_class_name, string $model_class_name, string $url)
    {
        /** @var RequestInterface $request */
        $request = new $request_class_name;
        $this->assertSame($url, $request->getUrl());
        $this->assertInstanceOf($model_class_name, $request->getModel());
    }
}
