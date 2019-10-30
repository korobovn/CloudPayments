<?php

namespace Korobovn\CloudPayments\Request;

use Korobovn\CloudPayments\Request\Model\CryptogramPaymentModel;

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
