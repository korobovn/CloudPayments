<?php

namespace Korobovn\Tests\Unit\Message\Response;

use Korobovn\CloudPayments\Message\Response\ApplePayStartSessionResponse;
use Korobovn\CloudPayments\Message\Response\Cryptogram3dSecureAuthRequiredResponse;
use Korobovn\CloudPayments\Message\Response\CryptogramTransactionAcceptedResponse;
use Korobovn\CloudPayments\Message\Response\CryptogramTransactionRejectedResponse;
use Korobovn\CloudPayments\Message\Response\InvalidRequestResponse;
use Korobovn\CloudPayments\Message\Response\Model\ApplePayStartSessionModel;
use Korobovn\CloudPayments\Message\Response\Model\Cryptogram3dSecureAuthRequiredModel;
use Korobovn\CloudPayments\Message\Response\Model\CryptogramTransactionAcceptedModel;
use Korobovn\CloudPayments\Message\Response\Model\CryptogramTransactionRejectedModel;
use Korobovn\CloudPayments\Message\Response\Model\NullModel;
use Korobovn\CloudPayments\Message\Response\Model\RefundPaymentModel;
use Korobovn\CloudPayments\Message\Response\Model\SubscriptionModel;
use Korobovn\CloudPayments\Message\Response\Model\SubscriptionsModel;
use Korobovn\CloudPayments\Message\Response\Model\TokenTransactionAcceptedModel;
use Korobovn\CloudPayments\Message\Response\Model\TokenTransactionRejectedModel;
use Korobovn\CloudPayments\Message\Response\RefundPaymentResponse;
use Korobovn\CloudPayments\Message\Response\ResponseInterface;
use Korobovn\CloudPayments\Message\Response\SubscriptionResponse;
use Korobovn\CloudPayments\Message\Response\SubscriptionsResponse;
use Korobovn\CloudPayments\Message\Response\SuccessResponse;
use Korobovn\CloudPayments\Message\Response\TokenTransactionAcceptedResponse;
use Korobovn\CloudPayments\Message\Response\TokenTransactionRejectedResponse;
use PHPUnit\Framework\TestCase;

/**
 * @group  unit
 * @group  responses
 * @covers \Korobovn\CloudPayments\Message\Response\ApplePayStartSessionResponse
 * @covers \Korobovn\CloudPayments\Message\Response\Cryptogram3dSecureAuthRequiredResponse
 * @covers \Korobovn\CloudPayments\Message\Response\CryptogramTransactionAcceptedResponse
 * @covers \Korobovn\CloudPayments\Message\Response\CryptogramTransactionRejectedResponse
 * @covers \Korobovn\CloudPayments\Message\Response\InvalidRequestResponse
 * @covers \Korobovn\CloudPayments\Message\Response\SubscriptionResponse
 * @covers \Korobovn\CloudPayments\Message\Response\SubscriptionsResponse
 * @covers \Korobovn\CloudPayments\Message\Response\SuccessResponse
 * @covers \Korobovn\CloudPayments\Message\Response\TokenTransactionAcceptedResponse
 * @covers \Korobovn\CloudPayments\Message\Response\TokenTransactionRejectedResponse
 * @covers \Korobovn\CloudPayments\Message\Response\RefundPaymentResponse
 */
class ResponsesTest extends TestCase
{
    public function modelDataProvider()
    {
        return [
            ApplePayStartSessionResponse::class =>
                [ApplePayStartSessionResponse::class, ApplePayStartSessionModel::class],

            Cryptogram3dSecureAuthRequiredResponse::class =>
                [Cryptogram3dSecureAuthRequiredResponse::class, Cryptogram3dSecureAuthRequiredModel::class],

            CryptogramTransactionAcceptedResponse::class =>
                [CryptogramTransactionAcceptedResponse::class, CryptogramTransactionAcceptedModel::class],

            CryptogramTransactionRejectedResponse::class =>
                [CryptogramTransactionRejectedResponse::class, CryptogramTransactionRejectedModel::class],

            InvalidRequestResponse::class =>
                [InvalidRequestResponse::class, NullModel::class],

            SubscriptionResponse::class =>
                [SubscriptionResponse::class, SubscriptionModel::class],

            SubscriptionsResponse::class =>
                [SubscriptionsResponse::class, SubscriptionsModel::class],

            SuccessResponse::class =>
                [SuccessResponse::class, NullModel::class],

            TokenTransactionAcceptedResponse::class =>
                [TokenTransactionAcceptedResponse::class, TokenTransactionAcceptedModel::class],

            TokenTransactionRejectedResponse::class =>
                [TokenTransactionRejectedResponse::class, TokenTransactionRejectedModel::class],

            RefundPaymentResponse::class =>
                [RefundPaymentResponse::class, RefundPaymentModel::class],
        ];
    }

    /**
     * @dataProvider modelDataProvider
     *
     * @param string $response_class_name
     * @param string $model_class
     */
    public function testCreate(string $response_class_name, string $model_class)
    {
        /** @var ResponseInterface $response */
        $response = new $response_class_name;
        $this->assertInstanceOf($model_class, $response->getModel());
    }
}
