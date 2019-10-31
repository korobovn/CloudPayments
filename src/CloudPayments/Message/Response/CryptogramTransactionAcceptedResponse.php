<?php

namespace Korobovn\CloudPayments\Message\Response;

use Korobovn\CloudPayments\Message\Response\Model\CryptogramTransactionAcceptedModel;

/**
 *
 * @method CryptogramTransactionAcceptedModel getModel()
 *
 * @see https://developers.cloudpayments.ru/#oplata-po-kriptogramme
 */
class CryptogramTransactionAcceptedResponse extends AbstractResponse
{
    /**
     *
     * @param CryptogramTransactionAcceptedModel $model
     */
    public function __construct(CryptogramTransactionAcceptedModel $model)
    {
        parent::__construct($model, true, null, null);
    }
}
