<?php

namespace Korobovn\CloudPayments\Message\Traits\ModelField;

trait TransactionIdInt
{
    /** @var int */
    protected $transaction_id;

    /**
     * @return int
     */
    public function getTransactionId(): int
    {
        return $this->transaction_id;
    }

    /**
     * @param int $transaction_id
     *
     * @return $this
     */
    protected function setTransactionId(int $transaction_id): self
    {
        $this->transaction_id = $transaction_id;

        return $this;
    }
}
