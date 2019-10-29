<?php

namespace Korobovn\CloudPayments\ModelFieldTrait;

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
    protected function setConfirmDateIso(string $confirm_date_iso): self
    {
        $this->confirm_date_iso = $confirm_date_iso;

        return $this;
    }
}
