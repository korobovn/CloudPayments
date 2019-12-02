<?php

declare(strict_types = 1);

namespace Korobovn\CloudPayments\Message\Request;

use Korobovn\CloudPayments\Message\Request\Model\ModelInterface;
use Korobovn\CloudPayments\Message\Response\InvalidRequestResponse;
use Korobovn\CloudPayments\Message\Response\SubscriptionsResponse;
use Korobovn\CloudPayments\Message\Strategy\StrategyInterface;
use Korobovn\CloudPayments\Message\Strategy\SubscriptionsStrategy;
use Korobovn\CloudPayments\Message\Request\Model\FindSubscriptionModel;

/**
 * @method FindSubscriptionModel getModel()
 * @method InvalidRequestResponse|SubscriptionsResponse send()
 * @method static FindSubscriptionRequest create()
 *
 * @see https://developers.cloudpayments.ru/#poisk-podpisok
 */
class FindSubscriptionRequest extends AbstractRequest
{
    /**
     * {@inheritDoc}
     */
    protected function getRelativeUrl(): string
    {
        return '/subscriptions/find';
    }

    /**
     * {@inheritDoc}
     */
    public function createModel(): ModelInterface
    {
        return new FindSubscriptionModel;
    }

    /**
     * {@inheritDoc}
     */
    public function getStrategy(): StrategyInterface
    {
        return new SubscriptionsStrategy;
    }
}
