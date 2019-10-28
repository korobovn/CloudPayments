<?php

namespace Korobovn\CloudPayments\Request;

use Korobovn\CloudPayments\Request\Model\TokenPaymentRequestModel;

class TokenPaymentAuthRequest extends TokenPaymentOnestepRequest
{
    /** @var string */
    protected $url = '/payments/tokens/auth';
}
