<?php

namespace Korobovn\CloudPayments\Message\Request;

use Korobovn\CloudPayments\Message\Request\Model\TokenPaymentModel;

/**
 * Class TokenPaymentAuthRequest.
 *
 * @method TokenPaymentModel getModel()
 *
 * @see https://developers.cloudpayments.ru/#oplata-po-tokenu-rekarring
 */
class TokenPaymentTwoStepRequest extends TokenPaymentOneStepRequest
{
    /** @var string */
    protected $url = '/payments/tokens/auth';
}