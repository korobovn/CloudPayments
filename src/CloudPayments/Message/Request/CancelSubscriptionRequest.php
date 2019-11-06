<?php

namespace Korobovn\CloudPayments\Message\Request;

use Korobovn\CloudPayments\Message\Request\Model\CancelSubscriptionModel;
use Korobovn\CloudPayments\Message\Strategy\SuccessStrategy;

/**
 *
 * @method CancelSubscriptionModel getModel()
 *
 * @see https://developers.cloudpayments.ru/#otmena-podpiski-na-rekurrentnye-platezhi
 */
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
