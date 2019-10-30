<?php

namespace Korobovn\CloudPayments\Request;

use Korobovn\CloudPayments\Request\Model\TokenPaymentModel;

/**
 * Class TokenPaymentAuthRequest.
 *
 * @method TokenPaymentModel getModel()
 *
 * @see https://developers.cloudpayments.ru/#oplata-po-tokenu-rekarring
 */
class TokenPaymentAuthRequest extends TokenPaymentOnestepRequest
{
    /** @var string */
    protected $url = '/payments/tokens/auth';
}
