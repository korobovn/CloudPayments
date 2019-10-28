<?php

namespace Korobovn\CloudPayments\ModelFieldTrait;

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
