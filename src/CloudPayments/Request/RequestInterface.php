<?php

namespace Korobovn\CloudPayments\Request;

use Korobovn\CloudPayments\Request\Model\ModelInterface;

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
}
