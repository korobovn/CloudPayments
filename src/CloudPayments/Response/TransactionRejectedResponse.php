<?php

namespace Korobovn\CloudPayments\Response;

use Korobovn\CloudPayments\Response\Model\TransactionRejectedModel;

class TransactionRejectedResponse extends AbstractResponse
{
    /** @var TransactionRejectedModel */
    protected $model;

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
