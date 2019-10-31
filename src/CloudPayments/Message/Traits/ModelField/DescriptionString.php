<?php

namespace Korobovn\CloudPayments\Message\Traits\ModelField;

trait DescriptionString
{
    /** @var string */
    protected $description;

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     *
     * @return $this
     */
    protected function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }
}
