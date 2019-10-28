<?php

namespace Korobovn\CloudPayments\ModelFieldTrait;

trait CurrencyString
{
    /** @var string */
    protected $currency;

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     *
     * @return $this
     */
    protected function setCurrency(string $currency): self
    {
        $this->currency = $currency;

        return $this;
    }
}
