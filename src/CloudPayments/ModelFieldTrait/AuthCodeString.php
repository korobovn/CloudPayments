<?php

namespace Korobovn\CloudPayments\ModelFieldTrait;

trait AuthCodeString
{
    /** @var string */
    protected $auth_code;

    /**
     * @return string
     */
    public function getAuthCode(): string
    {
        return $this->auth_code;
    }

    /**
     * @param string $auth_code
     *
     * @return $this
     */
    public function setAuthCode(string $auth_code): self
    {
        $this->auth_code = $auth_code;

        return $this;
    }
}
