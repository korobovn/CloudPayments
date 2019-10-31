<?php

namespace Korobovn\CloudPayments\Message\Response;

use Korobovn\CloudPayments\Message\Response\Model\CryptogramTransactionRejectedModel;

/**
 *
 * @method CryptogramTransactionRejectedModel getModel()
 *
 * @see https://developers.cloudpayments.ru/#oplata-po-kriptogramme
 */
class CryptogramTransactionRejectedResponse extends AbstractResponse
{
    /**
     *
     * @param CryptogramTransactionRejectedModel $model
     */
    public function __construct(CryptogramTransactionRejectedModel $model)
    {
        parent::__construct($model, false, null, null);
    }
}
