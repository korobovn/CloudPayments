<?php

namespace Korobovn\CloudPayments\Message\Traits\ModelField;

trait ConfirmDateString
{
    /** @var string */
    protected $confirm_date;

    /**
     * @return string
     */
    public function getConfirmDate(): string
    {
        return $this->confirm_date;
    }

    /**
     * @param string $confirm_date
     *
     * @return $this
     */
    protected function setConfirmDate(string $confirm_date): self
    {
        $this->confirm_date = $confirm_date;

        return $this;
    }
}
