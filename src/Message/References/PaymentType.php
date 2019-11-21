<?php

declare(strict_types = 1);

namespace Korobovn\CloudPayments\Message\References;

/**
 * @see https://developers.cloudpayments.ru/#sposoby-rascheta
 */
class PaymentType
{
    /**
     * Неизвестный способ расчета.
     */
    public const UNKNOWN = 0;

    /**
     * Предоплата 100%.
     */
    public const FULL_PREPAYMENT = 1;

    /**
     * Предоплата.
     */
    public const PARTIAL_PREPAYMENT = 2;

    /**
     * Аванс
     */
    public const ADVANCE_PAY = 3;

    /**
     * Полный расчёт
     */
    public const FULL_PAY = 4;

    /**
     * Частичный расчёт и кредит
     */
    public const PARTIAL_PAY_AND_CREDIT = 5;

    /**
     * Передача в кредит
     */
    public const CREDIT = 6;

    /**
     * Оплата кредита.
     */
    public const CREDIT_PAYMENT = 7;
}
