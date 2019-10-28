<?php

namespace Korobovn\CloudPayments\ModelFieldTrait;

trait InvoiceIdString
{
    /** @var string */
    protected $invoice_id;

    /**
     * @return string
     */
    public function getInvoiceId(): string
    {
        return $this->invoice_id;
    }

    /**
     * @param string $invoice_id
     *
     * @return $this
     */
    protected function setInvoiceId(string $invoice_id): self
    {
        $this->invoice_id = $invoice_id;

        return $this;
    }
}
