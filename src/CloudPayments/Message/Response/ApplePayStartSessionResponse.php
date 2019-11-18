<?php

namespace Korobovn\CloudPayments\Message\Response;

use Korobovn\CloudPayments\Message\Response\Model\ApplePayStartSessionModel;

/**
 * @method ApplePayStartSessionModel getModel()
 *
 * @see https://developers.cloudpayments.ru/#zapusk-sessii-dlya-oplaty-cherez-apple-pay
 */
class ApplePayStartSessionResponse extends AbstractResponse
{
    public function __construct()
    {
        $this->model = new ApplePayStartSessionModel;
    }
}
