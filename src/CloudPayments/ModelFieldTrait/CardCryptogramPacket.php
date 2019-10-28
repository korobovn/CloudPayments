<?php

namespace Korobovn\CloudPayments\ModelFieldTrait;

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
    protected function setCardCryptogramPacket(string $card_cryptogram_packet): self
    {
        $this->card_cryptogram_packet = $card_cryptogram_packet;

        return $this;
    }
}
