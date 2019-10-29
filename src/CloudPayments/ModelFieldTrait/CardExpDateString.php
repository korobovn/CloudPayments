<?php

namespace Korobovn\CloudPayments\ModelFieldTrait;

trait CardExpDateString
{
    /** @var string */
    protected $card_exp_date;

    /**
     * @return string
     */
    public function getCardExpDate(): string
    {
        return $this->card_exp_date;
    }

    /**
     * @param string $card_exp_date
     *
     * @return $this
     */
    public function setCardExpDate(string $card_exp_date): self
    {
        $this->card_exp_date = $card_exp_date;

        return $this;
    }
}
