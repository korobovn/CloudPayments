<?php

declare(strict_types = 1);

namespace Korobovn\CloudPayments\Message\Request;

/**
 * @see https://developers.cloudpayments.ru/#oplata-po-kriptogramme
 * @method static CryptogramPaymentTwoStepRequest create()
 */
class CryptogramPaymentTwoStepRequest extends CryptogramPaymentOneStepRequest
{
    /**
     * {@inheritDoc}
     */
    protected function getRelativeUrl(): string
    {
        return '/payments/cards/auth';
    }
}
