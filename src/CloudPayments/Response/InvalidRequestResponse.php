<?php

namespace Korobovn\CloudPayments\Response;

use Korobovn\CloudPayments\Response\Model\NullModel;

class InvalidRequestResponse extends AbstractResponse
{
    /**
     * InvalidRequestResponse constructor.
     *
     * @param string|null $message
     */
    public function __construct(?string $message)
    {
        parent::__construct(new NullModel, false, $message, null);
    }
}
