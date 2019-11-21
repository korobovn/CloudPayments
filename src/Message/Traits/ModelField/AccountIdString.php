<?php

namespace Korobovn\CloudPayments\Message\Traits\ModelField;

trait AccountIdString
{
    /** @var string */
    protected $account_id;

    /**
     * @return string
     */
    public function getAccountId(): string
    {
        return $this->account_id;
    }

    /**
     * @param string $account_id
     *
     * @return $this
     */
    public function setAccountId(string $account_id): self
    {
        $this->account_id = $account_id;

        return $this;
    }
}
