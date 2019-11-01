<?php

namespace Korobovn\CloudPayments\Message\Response;

use Korobovn\CloudPayments\Message\Response\Model\NullModel;

/**
 *
 * @method NullModel getModel()
 *
 * @see https://developers.cloudpayments.ru/#testovyy-metod
 * @see https://developers.cloudpayments.ru/#otmena-podpiski-na-rekurrentnye-platezhi
 */
class SuccessResponse extends AbstractResponse
{
    public function __construct()
    {
        $this->model = new NullModel;
    }
}
