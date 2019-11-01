<?php

namespace Korobovn\CloudPayments\Message\Traits\ModelField;

trait ConfirmDateIsoString
{
    /** @var string */
    protected $confirm_date_iso;

    /**
     * @return string
     */
    public function getConfirmDateIso(): string
    {
        return $this->confirm_date_iso;
    }

    /**
     * @param string $confirm_date_iso
     *
     * @return $this
     */
    public function setConfirmDateIso(string $confirm_date_iso): self
    {
        $this->confirm_date_iso = $confirm_date_iso;

        return $this;
    }
}
