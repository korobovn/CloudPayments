<?php

namespace Korobovn\CloudPayments\Request;

use Korobovn\CloudPayments\Request\Model\CryptogramPaymentRequestModel;

class CryptogramPaymentAuthRequest extends CryptogramPaymentOnestepRequest
{
    /** @var string */
    protected $url = '/payments/cards/auth';
}
