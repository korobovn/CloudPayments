<?php

namespace Korobovn\CloudPayments\ModelFieldTrait;

trait IpLongitudeFloat
{
    /** @var float */
    protected $ip_longitude;

    /**
     * @return float
     */
    public function getIpLongitude(): float
    {
        return $this->ip_longitude;
    }

    /**
     * @param float $ip_longitude
     *
     * @return $this
     */
    protected function setIpLongitude(float $ip_longitude): self
    {
        $this->ip_longitude = $ip_longitude;

        return $this;
    }
}
