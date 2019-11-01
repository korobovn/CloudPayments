<?php

namespace Korobovn\CloudPayments\Message\Traits\ModelField;

trait PaReqString
{
    /** @var string */
    protected $pa_req;

    /**
     * @return string
     */
    public function getPaReq(): string
    {
        return $this->pa_req;
    }

    /**
     * @param string $pa_req
     *
     * @return $this
     */
    public function setPaReq(string $pa_req): self
    {
        $this->pa_req = $pa_req;

        return $this;
    }
}
