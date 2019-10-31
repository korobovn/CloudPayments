<?php

namespace Korobovn\CloudPayments\Message\Request;

use Korobovn\CloudPayments\Message\Request\Model\TokenPaymentModel;
use Korobovn\CloudPayments\Message\Strategy\StrategyInterface;
use Korobovn\CloudPayments\Message\Strategy\TokenPaymentStrategy;

/**
 *
 * @method TokenPaymentModel getModel()
 *
 * @see https://developers.cloudpayments.ru/#oplata-po-tokenu-rekarring
 */
class TokenPaymentOneStepRequest extends AbstractRequest
{
    /** @var string */
    protected $url = '/payments/tokens/charge';

    /**
     *
     * @param TokenPaymentModel      $model
     * @param StrategyInterface|null $strategy
     */
    public function __construct(TokenPaymentModel $model, StrategyInterface $strategy = null)
    {
        if (! $strategy) {
            $strategy = new TokenPaymentStrategy;
        }

        parent::__construct($model, $strategy);
    }
}
