<?php

namespace Korobovn\CloudPayments\Message\Request;

use Korobovn\CloudPayments\Message\Strategy\CryptogramPaymentStrategy;
use Korobovn\CloudPayments\Message\Request\Model\CompletionOf3dSecureModel;

/**
 * @method CompletionOf3dSecureModel getModel()
 *
 * @see https://developers.cloudpayments.ru/#obrabotka-3-d-secure
 */
class CompletionOf3dSecureRequest extends AbstractRequest
{
    /** @var string */
    protected $url = '/payments/cards/post3ds';

    public function __construct()
    {
        $this->model    = new CompletionOf3dSecureModel;
        $this->strategy = new CryptogramPaymentStrategy;
    }
}
