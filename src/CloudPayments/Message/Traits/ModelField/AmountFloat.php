<?php

namespace Korobovn\CloudPayments\Message\Traits\ModelField;

trait AmountFloat
{
    /** @var float */
    protected $amount;

    /**
     * @return float
     */
    public function getAmount(): float
    {
        return $this->amount;
    }

    /**
     * @param float $amount
     *
     * @return $this
     */
    protected function setAmount(float $amount): self
    {
        $this->amount = $amount;

        return $this;
    }
}