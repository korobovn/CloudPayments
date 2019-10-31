<?php

namespace Korobovn\CloudPayments\Message\Request;

use Korobovn\CloudPayments\Message\Request\Model\ApplePayStartSessionModel;
use Korobovn\CloudPayments\Message\Strategy\ApplePayStartSessionStrategy;
use Korobovn\CloudPayments\Message\Strategy\StrategyInterface;

/**
 *
 * @method ApplePayStartSessionModel getModel()
 *
 * @see https://developers.cloudpayments.ru/#zapusk-sessii-dlya-oplaty-cherez-apple-pay
 */
class ApplePayStartSessionRequest extends AbstractRequest
{
    /** @var string */
    protected $url = '/applepay/startsession';

    public function __construct(ApplePayStartSessionModel $model, StrategyInterface $strategy = null)
    {
        if (! $strategy) {
            $strategy = new ApplePayStartSessionStrategy;
        }

        parent::__construct($model, $strategy);
    }
}
