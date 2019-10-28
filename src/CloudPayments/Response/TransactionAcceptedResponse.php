<?php

namespace Korobovn\CloudPayments\Response;

use Korobovn\CloudPayments\Response\Model\TransactionAcceptedModel;

class TransactionAcceptedResponse extends AbstractResponse
{
    /** @var TransactionAcceptedModel */
    protected $model;

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
