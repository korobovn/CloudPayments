<?php

namespace Korobovn\CloudPayments\ModelFieldTrait;

trait TestModeBool
{
    /** @var bool */
    protected $test_mode;

    /**
     * @return bool
     */
    public function isTestMode(): bool
    {
        return $this->test_mode;
    }

    /**
     * @param bool $test_mode
     *
     * @return $this
     */
    protected function setTestMode(bool $test_mode): self
    {
        $this->test_mode = $test_mode;

        return $this;
    }
}
