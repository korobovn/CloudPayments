<?php

namespace Korobovn\CloudPayments\Message\Traits\ModelField;

trait NameString
{
    /** @var string */
    protected $name;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return $this
     */
    protected function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }
}
