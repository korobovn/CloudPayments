<?php

namespace Korobovn\CloudPayments\ModelFieldTrait;

trait IpCountryString
{
    /** @var string */
    protected $ip_country;

    /**
     * @return string
     */
    public function getIpCountry(): string
    {
        return $this->ip_country;
    }

    /**
     * @param string $ip_country
     *
     * @return $this
     */
    protected function setIpCountry(string $ip_country): self
    {
        $this->ip_country = $ip_country;

        return $this;
    }
}
