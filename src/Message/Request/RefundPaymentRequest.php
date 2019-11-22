<?php

declare(strict_types = 1);

namespace Korobovn\CloudPayments\Message\Request;

use Korobovn\CloudPayments\Message\Request\Model\RefundPaymentModel;
use Korobovn\CloudPayments\Message\Response\InvalidRequestResponse;
use Korobovn\CloudPayments\Message\Response\RefundPaymentResponse;
use Korobovn\CloudPayments\Message\Strategy\RefundPaymentStrategy;

/**
 * @method RefundPaymentModel getModel()
 * @method InvalidRequestResponse|RefundPaymentResponse send()
 *
 * @see https://developers.cloudpayments.ru/#vozvrat-deneg
 */
class RefundPaymentRequest extends AbstractRequest
{
    /** @var string */
    protected $url = '/payments/refund';

    public function __construct()
    {
        $this->model    = new RefundPaymentModel;
        $this->strategy = new RefundPaymentStrategy;
    }
}
