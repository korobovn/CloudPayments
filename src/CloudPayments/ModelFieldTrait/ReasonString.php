<?php

namespace Korobovn\CloudPayments\ModelFieldTrait;

trait ReasonString
{
    /** @var string */
    protected $reason;

    /**
     * @return string
     */
    public function getReason(): string
    {
        return $this->reason;
    }

    /**
     * @param string $reason
     *
     * @return $this
     */
    protected function setReason(string $reason): self
    {
        $this->reason = $reason;

        return $this;
    }
}
