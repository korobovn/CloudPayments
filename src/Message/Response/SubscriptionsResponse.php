<?php

namespace Korobovn\CloudPayments\Message\Response;

use Korobovn\CloudPayments\Message\Response\Model\SubscriptionModel;
use Korobovn\CloudPayments\Message\Response\Model\SubscriptionsModel;

/**
 * @method SubscriptionModel[]|SubscriptionsModel getModel()
 *
 * @see https://developers.cloudpayments.ru/#poisk-podpisok
 */
class SubscriptionsResponse extends AbstractResponse
{
    public function __construct()
    {
        $this->model = new SubscriptionsModel;
    }
}
