<?php

namespace Korobovn\CloudPayments\ModelFieldTrait;

trait IpRegionString
{
    /** @var string */
    protected $ip_region;

    /**
     * @return string
     */
    public function getIpRegion(): string
    {
        return $this->ip_region;
    }

    /**
     * @param string $ip_region
     *
     * @return $this
     */
    protected function setIpRegion(string $ip_region): self
    {
        $this->ip_region = $ip_region;

        return $this;
    }
}
