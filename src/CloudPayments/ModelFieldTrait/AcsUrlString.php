<?php

namespace Korobovn\CloudPayments\ModelFieldTrait;

trait AcsUrlString
{
    /** @var string */
    protected $acs_url;

    /**
     * @return string
     */
    public function getAcsUrl(): string
    {
        return $this->acs_url;
    }

    /**
     * @param string $acs_url
     *
     * @return $this
     */
    protected function setAcsUrl(string $acs_url): self
    {
        $this->acs_url = $acs_url;

        return $this;
    }
}
