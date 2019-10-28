<?php

namespace Korobovn\CloudPayments\ModelFieldTrait;

trait PaymentCurrencyCodeInt
{
    /** @var int */
    protected $payment_currency_code;

    /**
     * @return int
     */
    public function getPaymentCurrencyCode(): int
    {
        return $this->payment_currency_code;
    }

    /**
     * @param int $payment_currency_code
     *
     * @return $this
     */
    protected function setPaymentCurrencyCode(int $payment_currency_code): self
    {
        $this->payment_currency_code = $payment_currency_code;

        return $this;
    }
}
