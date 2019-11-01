<?php

namespace Korobovn\CloudPayments\Message\Request;

use Korobovn\CloudPayments\Message\Request\Model\GetSubscriptionModel;
use Korobovn\CloudPayments\Message\Strategy\SubscriptionStrategy;

/**
 *
 * @method GetSubscriptionModel getModel()
 *
 * @see https://developers.cloudpayments.ru/#zapros-informatsii-o-podpiske
 */
class GetSubscriptionRequest extends AbstractRequest
{
    /** @var string */
    protected $url = '/subscriptions/get';

    public function __construct()
    {
        $this->model    = new GetSubscriptionModel;
        $this->strategy = new SubscriptionStrategy;
    }
}
