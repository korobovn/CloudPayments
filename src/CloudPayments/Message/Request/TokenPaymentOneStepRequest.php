<?php

namespace Korobovn\CloudPayments\Message\Request;

use Korobovn\CloudPayments\Message\Request\Model\TokenPaymentModel;
use Korobovn\CloudPayments\Message\Strategy\TokenPaymentStrategy;

/**
 *
 * @method TokenPaymentModel getModel()
 *
 * @see https://developers.cloudpayments.ru/#oplata-po-tokenu-rekarring
 */
class TokenPaymentOneStepRequest extends AbstractRequest
{
    /** @var string */
    protected $url = '/payments/tokens/charge';

    public function __construct()
    {
        $this->model    = new TokenPaymentModel;
        $this->strategy = new TokenPaymentStrategy;
    }
}
