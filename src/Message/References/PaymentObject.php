<?php

declare(strict_types = 1);

namespace Korobovn\CloudPayments\Message\References;

/**
 * @see https://developers.cloudpayments.ru/#predmety-rascheta
 */
class PaymentObject
{
    /**
     * Неизвестный предмет оплаты.
     */
    public const UNKNOWN = 0;

    /**
     * Товар.
     */
    public const COMMODITY = 1;

    /**
     * Подакцизный товар.
     */
    public const EXCISED_COMMODITY = 2;

    /**
     * Работа.
     */
    public const JOB = 3;

    /**
     * Услуга.
     */
    public const SERVICE = 4;

    /**
     * Ставка азартной игры.
     */
    public const GAMBLING_BET = 5;

    /**
     * Выигрыш азартной игры.
     */
    public const GAMBLING_WIN = 6;

    /**
     * Лотерейный билет
     */
    public const LOTTERY_TICKET = 7;

    /**
     * Выигрыш лотереи.
     */
    public const LOTTERY_WIN = 8;

    /**
     * Предоставление РИД.
     */
    public const RID_ACCESS = 9;

    /**
     * Платеж.
     */
    public const PAYMENT = 10;

    /**
     * Агентское вознаграждение.
     */
    public const AGENT_REWARD = 11;

    /**
     * Составной предмет расчета.
     */
    public const COMPOSITE = 12;

    /**
     * Иной предмет расчета.
     */
    public const ANOTHER = 13;
}
