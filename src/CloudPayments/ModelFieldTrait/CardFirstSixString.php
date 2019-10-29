<?php

namespace Korobovn\CloudPayments\ModelFieldTrait;

trait CardFirstSixString
{
    /** @var string */
    protected $card_first_six;

    /**
     * @return string
     */
    public function getCardFirstSix(): string
    {
        return $this->card_first_six;
    }

    /**
     * @param string $card_first_six
     *
     * @return $this
     */
    protected function setCardFirstSix(string $card_first_six): self
    {
        $this->card_first_six = $card_first_six;

        return $this;
    }
}
