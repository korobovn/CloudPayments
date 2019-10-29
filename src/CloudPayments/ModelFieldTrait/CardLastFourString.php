<?php

namespace Korobovn\CloudPayments\ModelFieldTrait;

trait CardLastFourString
{
    /** @var string */
    protected $card_last_four;

    /**
     * @return string
     */
    public function getCardLastFour(): string
    {
        return $this->card_last_four;
    }

    /**
     * @param string $card_last_four
     *
     * @return $this
     */
    protected function setCardLastFour(string $card_last_four): self
    {
        $this->card_last_four = $card_last_four;

        return $this;
    }
}
