<?php

declare(strict_types = 1);

namespace Korobovn\CloudPayments\Message\Request;

use Korobovn\CloudPayments\Message\Request\Model\ModelInterface;
use Korobovn\CloudPayments\Message\Strategy\ApplePayStartSessionStrategy;
use Korobovn\CloudPayments\Message\Request\Model\ApplePayStartSessionModel;
use Korobovn\CloudPayments\Message\Strategy\StrategyInterface;

/**
 * @method ApplePayStartSessionModel getModel()
 *
 * @see https://developers.cloudpayments.ru/#zapusk-sessii-dlya-oplaty-cherez-apple-pay
 */
class ApplePayStartSessionRequest extends AbstractRequest
{
    /**
     * {@inheritDoc}
     */
    protected function getRelativeUrl(): string
    {
        return '/applepay/startsession';
    }

    /**
     * {@inheritDoc}
     */
    public function createModel(): ModelInterface
    {
        return new ApplePayStartSessionModel;
    }

    /**
     * {@inheritDoc}
     */
    public function getStrategy(): StrategyInterface
    {
        return new ApplePayStartSessionStrategy;
    }
}
