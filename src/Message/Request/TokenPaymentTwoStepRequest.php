<?php

namespace Korobovn\CloudPayments\Message\Request;

use Korobovn\CloudPayments\Message\Request\Model\TokenPaymentModel;
use Korobovn\CloudPayments\Message\Response\CryptogramTransactionAcceptedResponse;
use Korobovn\CloudPayments\Message\Response\CryptogramTransactionRejectedResponse;
use Korobovn\CloudPayments\Message\Response\InvalidRequestResponse;

/**
 * @method TokenPaymentModel getModel()
 * @method InvalidRequestResponse|CryptogramTransactionRejectedResponse|CryptogramTransactionAcceptedResponse send()
 *
 * @see https://developers.cloudpayments.ru/#oplata-po-tokenu-rekarring
 */
class TokenPaymentTwoStepRequest extends TokenPaymentOneStepRequest
{
    /** @var string */
    protected $url = '/payments/tokens/auth';
}
