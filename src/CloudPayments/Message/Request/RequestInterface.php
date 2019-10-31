<?php

namespace Korobovn\CloudPayments\Message\Request;

use Korobovn\CloudPayments\Message\Request\Model\ModelInterface;
use Korobovn\CloudPayments\Message\Strategy\StrategyInterface;

interface RequestInterface
{
    /**
     * @return ModelInterface
     */
    public function getModel(): ModelInterface;

    /**
     * @return string
     */
    public function getUrl(): string;

    /**
     * @return StrategyInterface
     */
    public function getStrategy(): StrategyInterface;
}
