<?php

namespace Korobovn\CloudPayments\ModelFieldTrait;

trait StatusCodeInt
{
    /** @var int */
    protected $status_code;

    /**
     * @return int
     */
    public function getStatusCode(): int
    {
        return $this->status_code;
    }

    /**
     * @param int $status_code
     *
     * @return $this
     */
    protected function setStatusCode(int $status_code): self
    {
        $this->status_code = $status_code;

        return $this;
    }
}
