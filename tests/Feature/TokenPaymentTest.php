<?php

namespace Korobovn\Tests\Feature;

use Korobovn\CloudPayments\Message\Request\CryptogramPaymentOneStepRequest;
use Korobovn\CloudPayments\Message\Request\TokenPaymentOneStepRequest;
use Korobovn\CloudPayments\Message\Response\CryptogramTransactionAcceptedResponse;
use Korobovn\CloudPayments\Message\Response\TokenTransactionRejectedResponse;

/**
 * @group feature
 * @group token-payment
 *
 * @see   https://developers.cloudpayments.ru/#oplata-po-tokenu-rekarring
 */
class TokenPaymentTest extends AbstractFeatureTest
{
    /** @var float */
    protected $amount = 100.0;

    /** @var string */
    protected $currency = 'RUB';

    /** @var string */
    protected $account_id = 'user_x';

    /** @var string */
    protected $ip_address = '127.0.0.1';

    public function test(): void
    {
        $request = new CryptogramPaymentOneStepRequest;
        $request->getModel()
            ->setAmount($this->amount)
            ->setCurrency($this->currency)
            ->setAccountId($this->account_id)
            ->setIpAddress($this->ip_address)
            ->setName('CARDHOLDER NAME')
            ->setCardCryptogramPacket(env('CARD_CRYPTOGRAM_PACKET_WITHOUT_3D_SUCCESS_VISA'));

        /** @var CryptogramTransactionAcceptedResponse $response */
        $response = $this->client->send($request);

        $this->assertInstanceOf(CryptogramTransactionAcceptedResponse::class, $response);

        $token = $response->getModel()->getToken();

        $request = new TokenPaymentOneStepRequest;
        $request->getModel()
            ->setAmount($this->amount)
            ->setCurrency($this->currency)
            ->setAccountId($this->account_id)
            ->setToken($token);

        /** @var TokenTransactionRejectedResponse $response */
        $response = $this->client->send($request);

        $this->assertInstanceOf(TokenTransactionRejectedResponse::class, $response);
    }
}
