<?php

namespace Korobovn\CloudPayments\Response;

use Korobovn\CloudPayments\Response\Model\TokenTransactionRejectedModel;

/**
 *
 * @method TokenTransactionRejectedModel getModel()
 *
 * @see https://developers.cloudpayments.ru/#oplata-po-tokenu-rekarring
 */
class TokenTransactionRejectedResponse extends AbstractResponse
{
    /**
     *
     * @param TokenTransactionRejectedModel $model
     */
    public function __construct(TokenTransactionRejectedModel $model)
    {
        parent::__construct($model, false, null, null);
    }
}
