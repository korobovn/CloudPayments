<?php

declare(strict_types = 1);

namespace Korobovn\CloudPayments\Message\Response;

use Korobovn\CloudPayments\Message\Response\Model\RefundPaymentModel;

/**
 * @see https://developers.cloudpayments.ru/#vozvrat-deneg
 */
class RefundPaymentResponse extends AbstractResponse
{
    public function __construct()
    {
        $this->model = new RefundPaymentModel;
    }
}
