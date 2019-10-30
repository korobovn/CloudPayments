<?php

namespace Korobovn\CloudPayments\Request;

use Korobovn\CloudPayments\Request\Model\TokenPaymentModel;

/**
 * Class TokenPaymentOnestepRequest.
 *
 * @method TokenPaymentModel getModel()
 *
 * @see https://developers.cloudpayments.ru/#oplata-po-tokenu-rekarring
 */
class TokenPaymentOnestepRequest extends AbstractRequest
{
    /** @var string */
    protected $url = '/payments/tokens/charge';

    public function __construct(TokenPaymentModel $model)
    {
        parent::__construct($model);
    }
}
