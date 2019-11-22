<?php

declare(strict_types = 1);

namespace Korobovn\CloudPayments\Message\Request;

use Korobovn\CloudPayments\Message\Request\Model\NullModel;
use Korobovn\CloudPayments\Message\Strategy\SuccessStrategy;

/**
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
        $this->model    = new NullModel;
        $this->strategy = new SuccessStrategy;
    }
}
