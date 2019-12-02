<?php

declare(strict_types = 1);

namespace Korobovn\CloudPayments\Message\Response;

use Korobovn\CloudPayments\Message\Response\Model\ModelInterface;
use Korobovn\CloudPayments\Message\Response\Model\SubscriptionModel;
use Korobovn\CloudPayments\Message\Response\Model\SubscriptionsModel;

/**
 * @method SubscriptionModel[]|SubscriptionsModel getModel()
 *
 * @see https://developers.cloudpayments.ru/#poisk-podpisok
 */
class SubscriptionsResponse extends AbstractResponse
{
    /**
     * {@inheritDoc}
     */
    public function createModel(): ModelInterface
    {
        return new SubscriptionsModel;
    }
}
