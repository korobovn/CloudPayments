<?php

namespace Korobovn\CloudPayments\Message\Response;

use Korobovn\CloudPayments\Message\Response\Model\NullModel;

/**
 *
 * @method NullModel getModel()
 *
 * @see https://developers.cloudpayments.ru/#testovyy-metod
 */
class TestResponse extends AbstractResponse
{
    public function __construct()
    {
        $this->model = new NullModel;
    }
}
