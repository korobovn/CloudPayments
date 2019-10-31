<?php

namespace Korobovn\CloudPayments\Message\Traits\ModelField;

trait IpLatitudeFloat
{
    /** @var float */
    protected $ip_latitude;

    /**
     * @return float
     */
    public function getIpLatitude(): float
    {
        return $this->ip_latitude;
    }

    /**
     * @param float $ip_latitude
     *
     * @return $this
     */
    protected function setIpLatitude(float $ip_latitude): self
    {
        $this->ip_latitude = $ip_latitude;

        return $this;
    }
}
