<?php

namespace Korobovn\CloudPayments\Message\Request;

use Korobovn\CloudPayments\Message\Request\Model\CryptogramPaymentModel;
use Korobovn\CloudPayments\Message\Strategy\CryptogramPaymentStrategy;

/**
 *
 * @method CryptogramPaymentModel getModel()
 *
 * @see https://developers.cloudpayments.ru/#oplata-po-kriptogramme
 */
class CryptogramPaymentOneStepRequest extends AbstractRequest
{
    /** @var string */
    protected $url = '/payments/cards/charge';

    public function __construct()
    {
        $this->model    = new CryptogramPaymentModel;
        $this->strategy = new CryptogramPaymentStrategy;
    }
}
