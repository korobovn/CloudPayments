<?php

namespace Korobovn\CloudPayments\Message\Request;

use Korobovn\CloudPayments\Message\Request\Model\CancelPaymentModel;
use Korobovn\CloudPayments\Message\Response\InvalidRequestResponse;
use Korobovn\CloudPayments\Message\Response\SuccessResponse;
use Korobovn\CloudPayments\Message\Strategy\SuccessStrategy;

/**
 * @method CancelPaymentModel getModel()
 * @method InvalidRequestResponse|SuccessResponse send()
 *
 * @see https://developers.cloudpayments.ru/#otmena-oplaty
 */
class CancelPaymentRequest extends AbstractRequest
{
    /** @var string */
    protected $url = '/payments/void';

    public function __construct()
    {
        $this->model    = new CancelPaymentModel;
        $this->strategy = new SuccessStrategy;
    }
}
