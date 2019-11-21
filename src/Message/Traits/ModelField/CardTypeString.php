<?php

namespace Korobovn\CloudPayments\Message\Traits\ModelField;

trait CardTypeString
{
    /** @var string */
    protected $card_type;

    /**
     * @return string
     */
    public function getCardType(): string
    {
        return $this->card_type;
    }

    /**
     * @param string $card_type
     *
     * @return $this
     */
    public function setCardType(string $card_type): self
    {
        $this->card_type = $card_type;

        return $this;
    }
}
