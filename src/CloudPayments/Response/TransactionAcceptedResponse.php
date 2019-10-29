<?php

namespace Korobovn\CloudPayments\Response;

use Korobovn\CloudPayments\Response\Model\TransactionAcceptedModel;

/**
 * Class TransactionAcceptedResponse.
 *
 * @method TransactionAcceptedModel getModel()
 */
class TransactionAcceptedResponse extends AbstractResponse
{
    /**
     * TransactionAcceptedResponse constructor.
     *
     * @param TransactionAcceptedModel $model
     */
    public function __construct(TransactionAcceptedModel $model)
    {
        parent::__construct($model, true, null, null);
    }
}
