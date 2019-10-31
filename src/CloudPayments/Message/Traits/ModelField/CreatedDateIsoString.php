<?php

namespace Korobovn\CloudPayments\Message\Traits\ModelField;

trait CreatedDateIsoString
{
    /** @var string */
    protected $created_date_iso;

    /**
     * @return string
     */
    public function getCreatedDateIso(): string
    {
        return $this->created_date_iso;
    }

    /**
     * @param string $created_date_iso
     *
     * @return $this
     */
    protected function setCreatedDateIso(string $created_date_iso): self
    {
        $this->created_date_iso = $created_date_iso;

        return $this;
    }
}
