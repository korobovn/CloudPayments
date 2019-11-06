<?php

namespace Korobovn\CloudPayments\Message\Traits\ModelField;

trait IpLatitudeFloatNull
{
    /** @var float|null */
    protected $ip_latitude;

    /**
     * @return float|null
     */
    public function getIpLatitude(): ?float
    {
        return $this->ip_latitude;
    }

    /**
     * @param float|null $ip_latitude
     *
     * @return $this
     */
    public function setIpLatitude(?float $ip_latitude): self
    {
        $this->ip_latitude = $ip_latitude;

        return $this;
    }
}
