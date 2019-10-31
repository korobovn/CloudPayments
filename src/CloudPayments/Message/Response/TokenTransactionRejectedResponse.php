<?php

namespace Korobovn\CloudPayments\Message\Response;

use Korobovn\CloudPayments\Message\Response\Model\TokenTransactionRejectedModel;

/**
 *
 * @method TokenTransactionRejectedModel getModel()
 *
 * @see https://developers.cloudpayments.ru/#oplata-po-tokenu-rekarring
 */
class TokenTransactionRejectedResponse extends AbstractResponse
{
    public function __construct()
    {
        $this->model = new TokenTransactionRejectedModel;
    }
}
