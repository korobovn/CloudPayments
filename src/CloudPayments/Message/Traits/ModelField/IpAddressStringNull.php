<?php

namespace Korobovn\CloudPayments\Message\Traits\ModelField;

trait IpAddressStringNull
{
    /** @var string|null */
    protected $ip_address;

    /**
     * @return string|null
     */
    public function getIpAddress(): ?string
    {
        return $this->ip_address;
    }

    /**
     * @param string|null $ip_address
     *
     * @return $this
     */
    protected function setIpAddress(?string $ip_address): self
    {
        $this->ip_address = $ip_address;

        return $this;
    }
}
