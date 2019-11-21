<?php

namespace Korobovn\CloudPayments\Message\Request;

use Korobovn\CloudPayments\Message\Response\CryptogramTransactionAcceptedResponse;
use Korobovn\CloudPayments\Message\Response\CryptogramTransactionRejectedResponse;
use Korobovn\CloudPayments\Message\Response\InvalidRequestResponse;
use Korobovn\CloudPayments\Message\Strategy\TokenPaymentStrategy;
use Korobovn\CloudPayments\Message\Request\Model\TokenPaymentModel;

/**
 * @method TokenPaymentModel getModel()
 * @method InvalidRequestResponse|CryptogramTransactionRejectedResponse|CryptogramTransactionAcceptedResponse send()
 *
 * @see https://developers.cloudpayments.ru/#oplata-po-tokenu-rekarring
 */
class TokenPaymentOneStepRequest extends AbstractRequest
{
    /** @var string */
    protected $url = '/payments/tokens/charge';

    public function __construct()
    {
        $this->model    = new TokenPaymentModel;
        $this->strategy = new TokenPaymentStrategy;
    }
}
