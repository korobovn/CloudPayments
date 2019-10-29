<?php

namespace Korobovn\CloudPayments\ModelFieldTrait;

trait CardTypeCodeInt
{
    /** @var int */
    protected $card_type_code;

    /**
     * @return int
     */
    public function getCardTypeCode(): int
    {
        return $this->card_type_code;
    }

    /**
     * @param int $card_type_code
     *
     * @return $this
     */
    protected function setCardTypeCode(int $card_type_code): self
    {
        $this->card_type_code = $card_type_code;

        return $this;
    }
}
