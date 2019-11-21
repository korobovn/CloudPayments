<?php

namespace Korobovn\CloudPayments\Message\Request;

use Korobovn\CloudPayments\Message\Response\InvalidRequestResponse;
use Korobovn\CloudPayments\Message\Response\SubscriptionsResponse;
use Korobovn\CloudPayments\Message\Strategy\SubscriptionsStrategy;
use Korobovn\CloudPayments\Message\Request\Model\FindSubscriptionModel;

/**
 * @method FindSubscriptionModel getModel()
 * @method InvalidRequestResponse|SubscriptionsResponse send()
 *
 * @see https://developers.cloudpayments.ru/#poisk-podpisok
 */
class FindSubscriptionRequest extends AbstractRequest
{
    /** @var string */
    protected $url = '/subscriptions/find';

    public function __construct()
    {
        $this->model    = new FindSubscriptionModel;
        $this->strategy = new SubscriptionsStrategy;
    }
}
