<?php

namespace Korobovn\CloudPayments\Request;

use Korobovn\CloudPayments\Request\Model\CryptogramPaymentModel;

/**
 * Class CryptogramPaymentOnestepRequest.
 *
 * @method CryptogramPaymentModel getModel()
 *
 * @see https://developers.cloudpayments.ru/#oplata-po-kriptogramme
 */
class CryptogramPaymentOnestepRequest extends AbstractRequest
{
    /** @var string */
    protected $url = '/payments/cards/charge';

    public function __construct(CryptogramPaymentModel $model)
    {
        parent::__construct($model);
    }
}
