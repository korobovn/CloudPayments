<?php

declare(strict_types = 1);

namespace Korobovn\CloudPayments\Message\Request;

use Korobovn\CloudPayments\Message\Response\SuccessResponse;
use Korobovn\CloudPayments\Message\Strategy\SuccessStrategy;
use Korobovn\CloudPayments\Message\Response\InvalidRequestResponse;
use Korobovn\CloudPayments\Message\Request\Model\CancelSubscriptionModel;

/**
 * @method CancelSubscriptionModel getModel()
 * @method InvalidRequestResponse|SuccessResponse send()
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
