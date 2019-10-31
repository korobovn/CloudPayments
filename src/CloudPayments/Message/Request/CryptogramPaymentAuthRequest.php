<?php

namespace Korobovn\CloudPayments\Message\Request;

use Korobovn\CloudPayments\Message\Request\Model\CryptogramPaymentModel;

/**
 * Class CryptogramPaymentAuthRequest.
 *
 * @method CryptogramPaymentModel getModel()
 *
 * @see https://developers.cloudpayments.ru/#oplata-po-kriptogramme
 */
class CryptogramPaymentAuthRequest extends CryptogramPaymentOnestepRequest
{
    /** @var string */
    protected $url = '/payments/cards/auth';
}
