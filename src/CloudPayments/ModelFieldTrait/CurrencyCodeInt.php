<?php

namespace Korobovn\CloudPayments\ModelFieldTrait;

trait CurrencyCodeInt
{
    /** @var int */
    protected $currency_code;

    /**
     * @return int
     */
    public function getCurrencyCode(): int
    {
        return $this->currency_code;
    }

    /**
     * @param int $currency_code
     *
     * @return $this
     */
    protected function setCurrencyCode(int $currency_code): self
    {
        $this->currency_code = $currency_code;

        return $this;
    }
}
