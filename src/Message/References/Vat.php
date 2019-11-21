<?php

declare(strict_types = 1);

namespace Korobovn\CloudPayments\Message\References;

/**
 * @see https://developers.cloudpayments.ru/#znacheniya-stavki-nds
 */
class Vat
{
    /**
     * НДС не облагается.
     */
    public const NO_NDS = null;

    /**
     * НДС 0%.
     */
    public const NDS_0 = 0;

    /**
     * НДС 10%.
     */
    public const NDS_10 = 10;

    /**
     * НДС 20%.
     */
    public const NDS_20 = 20;

    /**
     * Расчетный НДС 10/110.
     */
    public const NDS_10_110 = 110;

    /**
     * Расчетный НДС 20/120.
     */
    public const NDS_20_120 = 120;
}
