<?php

namespace Korobovn\CloudPayments\Request;

use Korobovn\CloudPayments\Request\Model\CryptogramPaymentRequestModel;

class CryptogramPaymentOnestepRequest extends AbstractRequest
{
    /** @var string */
    protected $url = '/payments/cards/charge';

    public function __construct(CryptogramPaymentRequestModel $model)
    {
        parent::__construct($model);
    }
}
