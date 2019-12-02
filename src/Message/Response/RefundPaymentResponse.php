<?php

declare(strict_types = 1);

namespace Korobovn\CloudPayments\Message\Response;

use Korobovn\CloudPayments\Message\Response\Model\ModelInterface;
use Korobovn\CloudPayments\Message\Response\Model\RefundPaymentModel;

/**
 * @method RefundPaymentModel getModel()
 *
 * @see https://developers.cloudpayments.ru/#vozvrat-deneg
 */
class RefundPaymentResponse extends AbstractResponse
{
    /**
     * {@inheritDoc}
     */
    public function createModel(): ModelInterface
    {
        return new RefundPaymentModel;
    }
}
