<?php

namespace Korobovn\CloudPayments\Message\Traits\ModelField;

trait CardCryptogramPacket
{
    /** @var string */
    protected $card_cryptogram_packet;

    /**
     * @return string
     */
    public function getCardCryptogramPacket(): string
    {
        return $this->card_cryptogram_packet;
    }

    /**
     * @param string $card_cryptogram_packet
     *
     * @return $this
     */
    public function setCardCryptogramPacket(string $card_cryptogram_packet): self
    {
        $this->card_cryptogram_packet = $card_cryptogram_packet;

        return $this;
    }
}
