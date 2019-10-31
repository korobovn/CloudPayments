<?php

namespace Korobovn\CloudPayments\Message\Request;

use Korobovn\CloudPayments\Message\Request\Model\ModelInterface;
use Korobovn\CloudPayments\Message\Strategy\StrategyInterface;

class AbstractRequest implements RequestInterface
{
    /** @var string */
    protected $domain = 'https://api.cloudpayments.ru/';

    /** @var string */
    protected $url;

    /** @var ModelInterface */
    protected $model;

    /** @var StrategyInterface */
    protected $strategy;

    /**
     * AbstractRequest constructor.
     *
     * @param ModelInterface    $model
     * @param StrategyInterface $strategy
     */
    public function __construct(ModelInterface $model, StrategyInterface $strategy)
    {
        $this->model    = $model;
        $this->strategy = $strategy;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return rtrim($this->domain, '/') . '/' . ltrim($this->url, '/');
    }

    /**
     * @return ModelInterface
     */
    public function getModel(): ModelInterface
    {
        return $this->model;
    }

    /**
     * @return StrategyInterface
     */
    public function getStrategy(): StrategyInterface
    {
        return $this->strategy;
    }
}
