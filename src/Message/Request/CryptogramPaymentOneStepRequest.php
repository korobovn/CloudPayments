<?php

declare(strict_types = 1);

namespace Korobovn\CloudPayments\Message\Request;

use Korobovn\CloudPayments\Message\Response\Cryptogram3dSecureAuthRequiredResponse;
use Korobovn\CloudPayments\Message\Response\CryptogramTransactionAcceptedResponse;
use Korobovn\CloudPayments\Message\Response\CryptogramTransactionRejectedResponse;
use Korobovn\CloudPayments\Message\Response\InvalidRequestResponse;
use Korobovn\CloudPayments\Message\Strategy\CryptogramPaymentStrategy;
use Korobovn\CloudPayments\Message\Request\Model\CryptogramPaymentModel;

/**
 * @method CryptogramPaymentModel getModel()
 * @method InvalidRequestResponse|Cryptogram3dSecureAuthRequiredResponse|CryptogramTransactionRejectedResponse|CryptogramTransactionAcceptedResponse send()
 *
 * @see https://developers.cloudpayments.ru/#oplata-po-kriptogramme
 */
class CryptogramPaymentOneStepRequest extends AbstractRequest
{
    /** @var string */
    protected $url = '/payments/cards/charge';

    public function __construct()
    {
        $this->model    = new CryptogramPaymentModel;
        $this->strategy = new CryptogramPaymentStrategy;
    }
}
