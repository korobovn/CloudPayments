<?php

namespace Korobovn\CloudPayments\Response;

use Korobovn\CloudPayments\Response\Model\NullModel;

/**
 * Class TestResponse.
 *
 * @see https://developers.cloudpayments.ru/#testovyy-metod
 */
class TestResponse extends AbstractResponse
{
    public function __construct(?string $message)
    {
        parent::__construct(new NullModel, true, $message, null);
    }
}
