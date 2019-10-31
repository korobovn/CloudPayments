<?php

namespace Korobovn\CloudPayments\Message\Request;

use Korobovn\CloudPayments\Message\Request\Model\CryptogramPaymentModel;

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
