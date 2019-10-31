<?php

namespace Korobovn\CloudPayments\Message\Response;

use Korobovn\CloudPayments\Message\Response\Model\NullModel;

/**
 * Class InvalidRequestResponse.
 *
 * @method NullModel getModel()
 */
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
