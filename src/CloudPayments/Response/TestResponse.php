<?php

namespace Korobovn\CloudPayments\Response;

use Korobovn\CloudPayments\Response\Model\NullModel;

class TestResponse extends AbstractResponse
{
    public function __construct(?string $message)
    {
        parent::__construct(new NullModel, true, $message, null);
    }
}
