<?php

namespace Korobovn\CloudPayments\Request;

use Korobovn\CloudPayments\Request\Model\ModelInterface;

interface RequestInterface
{
    public function getModel(): ModelInterface;

    public function getUrl(): string;
}
