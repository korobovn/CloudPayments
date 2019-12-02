<?php

declare(strict_types = 1);

namespace Korobovn\CloudPayments\Message\Request;

use Korobovn\CloudPayments\Message\Request\Model\ModelInterface;
use Korobovn\CloudPayments\Message\Request\Model\RefundPaymentModel;
use Korobovn\CloudPayments\Message\Response\InvalidRequestResponse;
use Korobovn\CloudPayments\Message\Response\RefundPaymentResponse;
use Korobovn\CloudPayments\Message\Strategy\RefundPaymentStrategy;
use Korobovn\CloudPayments\Message\Strategy\StrategyInterface;

/**
 * @method RefundPaymentModel getModel()
 * @method InvalidRequestResponse|RefundPaymentResponse send()
 * @method static RefundPaymentRequest create()
 *
 * @see https://developers.cloudpayments.ru/#vozvrat-deneg
 */
class RefundPaymentRequest extends AbstractRequest
{
    /**
     * {@inheritDoc}
     */
    protected function getRelativeUrl(): string
    {
        return '/payments/refund';
    }

    /**
     * {@inheritDoc}
     */
    public function createModel(): ModelInterface
    {
        return new RefundPaymentModel;
    }

    /**
     * {@inheritDoc}
     */
    public function getStrategy(): StrategyInterface
    {
        return new RefundPaymentStrategy;
    }
}
