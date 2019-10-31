<?php

namespace Korobovn\CloudPayments\Message\Response;

use Korobovn\CloudPayments\Message\Response\Model\TokenTransactionAcceptedModel;

/**
 *
 * @method TokenTransactionAcceptedModel getModel()
 *
 * @see https://developers.cloudpayments.ru/#oplata-po-tokenu-rekarring
 */
class TokenTransactionAcceptedResponse extends AbstractResponse
{
    /**
     *
     * @param TokenTransactionAcceptedModel $model
     */
    public function __construct(TokenTransactionAcceptedModel $model)
    {
        parent::__construct($model, true, null, null);
    }
}