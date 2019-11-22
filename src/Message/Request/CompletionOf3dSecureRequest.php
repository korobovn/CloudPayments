<?php

declare(strict_types = 1);

namespace Korobovn\CloudPayments\Message\Request;

use Korobovn\CloudPayments\Message\Response\Cryptogram3dSecureAuthRequiredResponse;
use Korobovn\CloudPayments\Message\Response\CryptogramTransactionAcceptedResponse;
use Korobovn\CloudPayments\Message\Response\CryptogramTransactionRejectedResponse;
use Korobovn\CloudPayments\Message\Response\InvalidRequestResponse;
use Korobovn\CloudPayments\Message\Strategy\CryptogramPaymentStrategy;
use Korobovn\CloudPayments\Message\Request\Model\CompletionOf3dSecureModel;

/**
 * @method CompletionOf3dSecureModel getModel()
 * @method InvalidRequestResponse|Cryptogram3dSecureAuthRequiredResponse|CryptogramTransactionRejectedResponse|CryptogramTransactionAcceptedResponse send()
 *
 * @see https://developers.cloudpayments.ru/#obrabotka-3-d-secure
 */
class CompletionOf3dSecureRequest extends AbstractRequest
{
    /** @var string */
    protected $url = '/payments/cards/post3ds';

    public function __construct()
    {
        $this->model    = new CompletionOf3dSecureModel;
        $this->strategy = new CryptogramPaymentStrategy;
    }
}
