<?php

namespace Korobovn\CloudPayments\Response;

use Korobovn\CloudPayments\Response\Model\TransactionRejectedModel;

/**
 * Class TransactionRejectedResponse.
 *
 * @method TransactionRejectedModel getModel()
 */
class TransactionRejectedResponse extends AbstractResponse
{
    /**
     * TransactionRejectedResponse constructor.
     *
     * @param TransactionRejectedModel $model
     */
    public function __construct(TransactionRejectedModel $model)
    {
        parent::__construct($model, false, null, null);
    }
}
