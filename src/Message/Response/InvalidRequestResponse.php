<?php

declare(strict_types = 1);

namespace Korobovn\CloudPayments\Message\Response;

use Korobovn\CloudPayments\Message\Response\Model\NullModel;

/**
 * @method NullModel getModel()
 */
class InvalidRequestResponse extends AbstractResponse
{
    public function __construct()
    {
        $this->model = new NullModel;
    }
}
