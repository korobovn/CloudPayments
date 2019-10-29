<?php

namespace Korobovn\CloudPayments\Request;

use Korobovn\CloudPayments\Request\Model\NullModel;

class TestRequest extends AbstractRequest
{
    /** @var string */
    protected $url = '/test';

    public function __construct()
    {
        parent::__construct(new NullModel);
    }
}
