<?php

namespace Korobovn\CloudPayments\ModelFieldTrait;

trait EmailStringNull
{
    /** @var string|null */
    protected $email;

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string|null $email
     *
     * @return $this
     */
    protected function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }
}
