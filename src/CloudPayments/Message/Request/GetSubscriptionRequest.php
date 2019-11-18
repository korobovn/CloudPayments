<?php

namespace Korobovn\CloudPayments\Message\Request;

use Korobovn\CloudPayments\Message\Response\SubscriptionResponse;
use Korobovn\CloudPayments\Message\Strategy\SubscriptionStrategy;
use Korobovn\CloudPayments\Message\Response\InvalidRequestResponse;
use Korobovn\CloudPayments\Message\Request\Model\GetSubscriptionModel;

/**
 * @method GetSubscriptionModel getModel()
 * @method InvalidRequestResponse|SubscriptionResponse send()
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
