<?php

declare(strict_types = 1);

namespace Korobovn\CloudPayments\Message\References;

/**
 * @see https://developers.cloudpayments.ru/#sistemy-nalogooblozheniya
 */
class TaxationSystem
{
    /**
     * Общая система налогообложения.
     */
    public const OSN = 0;

    /**
     * Упрощенная система налогообложения (Доход).
     */
    public const USN_INCOME = 1;

    /**
     * Упрощенная система налогообложения (Доход минус Расход).
     */
    public const USN_INCOME_OUTCOME = 2;

    /**
     * Единый налог на вмененный доход.
     */
    public const ENVD = 3;

    /**
     * Единый сельскохозяйственный налог.
     */
    public const ESHN = 4;

    /**
     * Патентная система налогообложения.
     */
    public const PATENT = 5;
}
