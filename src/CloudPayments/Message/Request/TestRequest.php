<?php

namespace Korobovn\CloudPayments\Message\Request;

use Korobovn\CloudPayments\Message\Request\Model\NullModel;
use Korobovn\CloudPayments\Message\Strategy\StrategyInterface;
use Korobovn\CloudPayments\Message\Strategy\TestStrategy;

/**
 * Class TestRequest.
 *
 * @method NullModel getModel()
 *
 * @see https://developers.cloudpayments.ru/#testovyy-metod
 */
class TestRequest extends AbstractRequest
{
    /** @var string */
    protected $url = '/test';

    /**
     *
     * @param StrategyInterface|null $strategy
     */
    public function __construct(StrategyInterface $strategy = null)
    {
        if (! $strategy) {
            $strategy = new TestStrategy;
        }

        parent::__construct(new NullModel, $strategy);
    }
}
