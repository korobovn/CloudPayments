<?php

namespace Korobovn\CloudPayments\Message\Traits\ModelField;

trait AuthDateIsoString
{
    /** @var string */
    protected $auth_date_iso;

    /**
     * @return string
     */
    public function getAuthDateIso(): string
    {
        return $this->auth_date_iso;
    }

    /**
     * @param string $auth_date_iso
     *
     * @return $this
     */
    protected function setAuthDateIso(string $auth_date_iso): self
    {
        $this->auth_date_iso = $auth_date_iso;

        return $this;
    }
}
