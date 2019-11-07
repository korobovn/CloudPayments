<?php

namespace Korobovn\Tests\Feature;

use Korobovn\CloudPayments\Message\Request\CryptogramPaymentOneStepRequest;
use Korobovn\CloudPayments\Message\Response\Cryptogram3dSecureAuthRequiredResponse;
use Korobovn\CloudPayments\Message\Response\CryptogramTransactionAcceptedResponse;
use Korobovn\CloudPayments\Message\Response\CryptogramTransactionRejectedResponse;
use Korobovn\CloudPayments\Message\Response\InvalidRequestResponse;

/**
 * @group feature
 * @group cryptogram-payment
 *
 * @see   https://developers.cloudpayments.ru/#oplata-po-kriptogramme
 */
class CryptogramPaymentTest extends AbstractFeatureTest
{
    public function testSuccessPaymentWith3d(): void
    {
        $request = new CryptogramPaymentOneStepRequest;
        $request->getModel()
            ->setAmount(100.0)
            ->setCurrency('RUB')
            ->setIpAddress('127.0.0.1')
            ->setName('CARDHOLDER NAME')
            ->setCardCryptogramPacket(env('CARD_CRYPTOGRAM_PACKET_WITH_3D_SUCCESS'));

        /** @var Cryptogram3dSecureAuthRequiredResponse $response */
        $response = $this->client->send($request);

        $this->assertInstanceOf(Cryptogram3dSecureAuthRequiredResponse::class, $response);
    }

    public function testSuccessPaymentWithout3d(): void
    {
        $request = new CryptogramPaymentOneStepRequest;
        $request->getModel()
            ->setAmount(100.0)
            ->setCurrency('RUB')
            ->setIpAddress('127.0.0.1')
            ->setName('CARDHOLDER NAME')
            ->setCardCryptogramPacket(env('CARD_CRYPTOGRAM_PACKET_WITHOUT_3D_SUCCESS_MASTER_CARD'));

        /** @var CryptogramTransactionAcceptedResponse $response */
        $response = $this->client->send($request);

        $this->assertInstanceOf(CryptogramTransactionAcceptedResponse::class, $response);
    }

    public function testFailPaymentWithout3d(): void
    {
        $request = new CryptogramPaymentOneStepRequest;
        $request->getModel()
            ->setAmount(100.0)
            ->setCurrency('RUB')
            ->setIpAddress('127.0.0.1')
            ->setName('CARDHOLDER NAME')
            ->setCardCryptogramPacket(env('CARD_CRYPTOGRAM_PACKET_WITHOUT_3D_FAIL'));

        /** @var CryptogramTransactionRejectedResponse $response */
        $response = $this->client->send($request);

        $this->assertInstanceOf(CryptogramTransactionRejectedResponse::class, $response);
        $this->assertSame('InsufficientFunds', $response->getModel()->getReason());
        $this->assertSame(5051, $response->getModel()->getReasonCode());
    }

    public function testInvalidRequest(): void
    {
        $request = new CryptogramPaymentOneStepRequest;
        $request->getModel()
            ->setAmount(0)
            ->setCurrency('RUB')
            ->setIpAddress('127.0.0.1')
            ->setName('CARDHOLDER NAME')
            ->setCardCryptogramPacket(env('CARD_CRYPTOGRAM_PACKET_WITHOUT_3D_SUCCESS_MASTER_CARD'));

        /** @var InvalidRequestResponse $response */
        $response = $this->client->send($request);

        $this->assertInstanceOf(InvalidRequestResponse::class, $response);
        $this->assertSame('Amount is required; Amount value is too small', $response->getMessage());
    }
}
