<?php

namespace Korobovn\CloudPayments\Request;

use Korobovn\CloudPayments\Request\Model\TokenPaymentRequestModel;

class TokenPaymentOnestepRequest extends AbstractRequest
{
    /** @var string */
    protected $url = '/payments/tokens/charge';

    public function __construct(TokenPaymentRequestModel $model)
    {
        parent::__construct($model);
    }
}
