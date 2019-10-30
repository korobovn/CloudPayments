<?php

namespace Korobovn\CloudPayments\RequestManagementStrategy;

use Korobovn\CloudPayments\Request\CryptogramPaymentAuthRequest;

/**
 * Class CryptogramPaymentAuthRequestRequestManagementStrategy.
 *
 * @see https://developers.cloudpayments.ru/#oplata-po-kriptogramme
 */
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
