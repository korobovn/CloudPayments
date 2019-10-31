<?php

namespace Korobovn\CloudPayments\Message\Traits\ModelField;

trait IpDistrictString
{
    /** @var string */
    protected $ip_district;

    /**
     * @return string
     */
    public function getIpDistrict(): string
    {
        return $this->ip_district;
    }

    /**
     * @param string $ip_district
     *
     * @return $this
     */
    protected function setIpDistrict(string $ip_district): self
    {
        $this->ip_district = $ip_district;

        return $this;
    }
}
