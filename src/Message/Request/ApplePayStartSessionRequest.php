<?php

namespace Korobovn\CloudPayments\Message\Request;

use Korobovn\CloudPayments\Message\Strategy\ApplePayStartSessionStrategy;
use Korobovn\CloudPayments\Message\Request\Model\ApplePayStartSessionModel;

/**
 * @method ApplePayStartSessionModel getModel()
 *
 * @see https://developers.cloudpayments.ru/#zapusk-sessii-dlya-oplaty-cherez-apple-pay
 */
class ApplePayStartSessionRequest extends AbstractRequest
{
    /** @var string */
    protected $url = '/applepay/startsession';

    public function __construct()
    {
        $this->model    = new ApplePayStartSessionModel;
        $this->strategy = new ApplePayStartSessionStrategy;
    }
}
