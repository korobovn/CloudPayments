<?php

namespace Korobovn\CloudPayments\RequestManagementStrategy;

use Korobovn\CloudPayments\Request\CryptogramPaymentAuthRequest;

class CryptogramPaymentAuthRequestRequestManagementStrategy extends CryptogramPaymentOnestepRequestManagementStrategy
{
    /**
     * CryptogramPaymentAuthManagementStrategy constructor.
     *
     * @param CryptogramPaymentAuthRequest $request
     */
    public function __construct(CryptogramPaymentAuthRequest $request)
    {
        parent::__construct($request);
    }
}
