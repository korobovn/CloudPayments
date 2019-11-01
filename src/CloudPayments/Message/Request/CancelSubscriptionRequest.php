<?php

namespace Korobovn\CloudPayments\Message\Request;

use Korobovn\CloudPayments\Message\Request\Model\CancelSubscriptionModel;
use Korobovn\CloudPayments\Message\Strategy\SuccessStrategy;

class CancelSubscriptionRequest extends AbstractRequest
{
    /** @var string */
    protected $url = '/subscriptions/cancel';

    public function __construct()
    {
        $this->model    = new CancelSubscriptionModel;
        $this->strategy = new SuccessStrategy;
    }
}
