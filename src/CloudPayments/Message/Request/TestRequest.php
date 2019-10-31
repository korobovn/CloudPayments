<?php

namespace Korobovn\CloudPayments\Message\Request;

use Korobovn\CloudPayments\Message\Request\Model\NullModel;

/**
 * Class TestRequest.
 *
 * @method NullModel getModel()
 *
 * @see https://developers.cloudpayments.ru/#testovyy-metod
 */
class TestRequest extends AbstractRequest
{
    /** @var string */
    protected $url = '/test';

    public function __construct()
    {
        parent::__construct(new NullModel);
    }
}
