<?php

namespace Korobovn\CloudPayments\Message\Strategy;

use Korobovn\CloudPayments\Message\Request\TokenPaymentAuthRequest;

/**
 *
 * @see https://developers.cloudpayments.ru/#oplata-po-tokenu-rekarring
 */
class TokenPaymentAuthStrategy extends TokenPaymentOnestepStrategy
{
    /**
     *
     * @param TokenPaymentAuthRequest $request
     */
    public function __construct(TokenPaymentAuthRequest $request)
    {
        parent::__construct($request);
    }
}
