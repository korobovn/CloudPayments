<?php

namespace Korobovn\CloudPayments\Message\Traits\ModelField;

trait IpCityString
{
    /** @var string */
    protected $ip_city;

    /**
     * @return string
     */
    public function getIpCity(): string
    {
        return $this->ip_city;
    }

    /**
     * @param string $ip_city
     *
     * @return $this
     */
    protected function setIpCity(string $ip_city): self
    {
        $this->ip_city = $ip_city;

        return $this;
    }
}
