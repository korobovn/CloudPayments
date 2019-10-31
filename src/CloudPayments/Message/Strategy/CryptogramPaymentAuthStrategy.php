<?php

namespace Korobovn\CloudPayments\Message\Strategy;

use Korobovn\CloudPayments\Message\Request\CryptogramPaymentAuthRequest;

/**
 *
 * @see https://developers.cloudpayments.ru/#oplata-po-kriptogramme
 */
class CryptogramPaymentAuthStrategy extends CryptogramPaymentOnestepStrategy
{
    /**
     *
     * @param CryptogramPaymentAuthRequest $request
     */
    public function __construct(CryptogramPaymentAuthRequest $request)
    {
        parent::__construct($request);
    }
}
