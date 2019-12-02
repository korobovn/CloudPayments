<?php

declare(strict_types = 1);

namespace Korobovn\CloudPayments\Message\Request;

use Korobovn\CloudPayments\Message\Request\Model\ModelInterface;
use Korobovn\CloudPayments\Message\Request\Model\NullModel;
use Korobovn\CloudPayments\Message\Response\InvalidRequestResponse;
use Korobovn\CloudPayments\Message\Response\SuccessResponse;
use Korobovn\CloudPayments\Message\Strategy\StrategyInterface;
use Korobovn\CloudPayments\Message\Strategy\SuccessStrategy;

/**
 * @method NullModel getModel()
 * @method InvalidRequestResponse|SuccessResponse send()
 * @method static TestRequest create()
 *
 * @see https://developers.cloudpayments.ru/#testovyy-metod
 */
class TestRequest extends AbstractRequest
{
    /**
     * {@inheritDoc}
     */
    protected function getRelativeUrl(): string
    {
        return '/test';
    }

    /**
     * {@inheritDoc}
     */
    public function createModel(): ModelInterface
    {
        return new NullModel;
    }

    /**
     * {@inheritDoc}
     */
    public function getStrategy(): StrategyInterface
    {
        return new SuccessStrategy;
    }
}
