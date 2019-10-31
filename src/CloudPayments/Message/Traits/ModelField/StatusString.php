<?php

namespace Korobovn\CloudPayments\Message\Traits\ModelField;

trait StatusString
{
    /** @var string */
    protected $status;

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     *
     * @return $this
     */
    protected function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }
}
