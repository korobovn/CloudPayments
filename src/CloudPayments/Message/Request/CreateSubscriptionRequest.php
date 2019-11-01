<?php

namespace Korobovn\CloudPayments\Message\Request;

use Korobovn\CloudPayments\Message\Request\Model\CreateSubscriptionModel;
use Korobovn\CloudPayments\Message\Strategy\SubscriptionStrategy;

/**
 *
 * @method CreateSubscriptionModel getModel()
 *
 * @see https://developers.cloudpayments.ru/#sozdanie-podpiski-na-rekurrentnye-platezhi
 */
class CreateSubscriptionRequest extends AbstractRequest
{
    /** @var string */
    protected $url = '/subscriptions/create';

    public function __construct()
    {
        $this->model    = new CreateSubscriptionModel;
        $this->strategy = new SubscriptionStrategy;
    }
}
