<?php

namespace Korobovn\CloudPayments\Message\Request;

use Korobovn\CloudPayments\Message\Response\InvalidRequestResponse;
use Korobovn\CloudPayments\Message\Response\SubscriptionResponse;
use Korobovn\CloudPayments\Message\Strategy\SubscriptionStrategy;
use Korobovn\CloudPayments\Message\Request\Model\UpdateSubscriptionModel;

/**
 * @method UpdateSubscriptionModel getModel()
 * @method InvalidRequestResponse|SubscriptionResponse send()
 *
 * @see https://developers.cloudpayments.ru/#izmenenie-podpiski-na-rekurrentnye-platezhi
 */
class UpdateSubscriptionRequest extends AbstractRequest
{
    /** @var string */
    protected $url = '/subscriptions/update';

    public function __construct()
    {
        $this->model    = new UpdateSubscriptionModel;
        $this->strategy = new SubscriptionStrategy;
    }
}
