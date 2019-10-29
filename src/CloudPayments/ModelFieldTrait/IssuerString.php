<?php

namespace Korobovn\CloudPayments\ModelFieldTrait;

trait IssuerString
{
    /** @var string */
    protected $issuer;

    /**
     * @return string
     */
    public function getIssuer(): string
    {
        return $this->issuer;
    }

    /**
     * @param string $issuer
     *
     * @return $this
     */
    protected function setIssuer(string $issuer): self
    {
        $this->issuer = $issuer;

        return $this;
    }
}
