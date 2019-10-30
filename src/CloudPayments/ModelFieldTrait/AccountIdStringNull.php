<?php

namespace Korobovn\CloudPayments\ModelFieldTrait;

trait AccountIdStringNull
{
    /** @var string|null */
    protected $account_id;

    /**
     * @return string|null
     */
    public function getAccountId(): ?string
    {
        return $this->account_id;
    }

    /**
     * @param string|null $account_id
     *
     * @return $this
     */
    protected function setAccountId(?string $account_id): self
    {
        $this->account_id = $account_id;

        return $this;
    }
}
