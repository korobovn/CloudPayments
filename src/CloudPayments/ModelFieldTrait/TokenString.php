<?php

namespace Korobovn\CloudPayments\ModelFieldTrait;

trait TokenString
{
    /** @var string */
    protected $token;

    /**
     * @return string
     */
    public function getToken(): string
    {
        return $this->token;
    }

    /**
     * @param string $token
     *
     * @return $this
     */
    protected function setToken(string $token): self
    {
        $this->token = $token;

        return $this;
    }
}
