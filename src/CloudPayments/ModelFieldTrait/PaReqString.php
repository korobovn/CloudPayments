<?php

namespace Korobovn\CloudPayments\ModelFieldTrait;

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
    protected function setPaReq(string $pa_req): self
    {
        $this->pa_req = $pa_req;

        return $this;
    }
}
