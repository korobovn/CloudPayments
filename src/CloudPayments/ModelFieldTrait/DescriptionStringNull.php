<?php

namespace Korobovn\CloudPayments\ModelFieldTrait;

trait DescriptionStringNull
{
    /** @var string|null */
    protected $description;

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     *
     * @return $this
     */
    protected function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }
}
