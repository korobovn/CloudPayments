<?php

namespace Korobovn\CloudPayments\Message\Request;

use Korobovn\CloudPayments\Message\Request\Model\CryptogramPaymentModel;
use Korobovn\CloudPayments\Message\Strategy\CryptogramPaymentStrategy;
use Korobovn\CloudPayments\Message\Strategy\StrategyInterface;

/**
 *
 * @method CryptogramPaymentModel getModel()
 *
 * @see https://developers.cloudpayments.ru/#oplata-po-kriptogramme
 */
class CryptogramPaymentOneStepRequest extends AbstractRequest
{
    /** @var string */
    protected $url = '/payments/cards/charge';

    /**
     *
     * @param CryptogramPaymentModel $model
     * @param StrategyInterface|null $strategy
     */
    public function __construct(CryptogramPaymentModel $model, StrategyInterface $strategy = null)
    {
        if (! $strategy) {
            $strategy = new CryptogramPaymentStrategy;
        }
        parent::__construct($model, $strategy);
    }
}
