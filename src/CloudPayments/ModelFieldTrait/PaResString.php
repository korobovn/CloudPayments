<?php

namespace Korobovn\CloudPayments\ModelFieldTrait;

trait PaResString
{
    /** @var string */
    protected $pa_res;

    /**
     * @return string
     */
    public function getPaRes(): string
    {
        return $this->pa_res;
    }

    /**
     * @param string $pa_res
     *
     * @return $this
     */
    protected function setPaRes(string $pa_res): self
    {
        $this->pa_res = $pa_res;

        return $this;
    }
}
