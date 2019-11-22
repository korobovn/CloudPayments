<?php

declare(strict_types = 1);

namespace Korobovn\CloudPayments\Message\Response;

use Korobovn\CloudPayments\Message\Response\Model\TokenTransactionAcceptedModel;

/**
 * @method TokenTransactionAcceptedModel getModel()
 *
 * @see https://developers.cloudpayments.ru/#oplata-po-tokenu-rekarring
 */
class TokenTransactionAcceptedResponse extends AbstractResponse
{
    public function __construct()
    {
        $this->model = new TokenTransactionAcceptedModel;
    }
}
