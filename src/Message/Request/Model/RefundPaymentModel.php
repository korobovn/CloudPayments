<?php

declare(strict_types = 1);

namespace Korobovn\CloudPayments\Message\Request\Model;

use Korobovn\CloudPayments\Message\Traits\ModelField\AmountFloat;
use Korobovn\CloudPayments\Message\Traits\ModelField\JsonDataStringNull;
use Korobovn\CloudPayments\Message\Traits\ModelField\TransactionIdInt;

/**
 * @see https://developers.cloudpayments.ru/#vozvrat-deneg
 */
class RefundPaymentModel extends AbstractModel
{
    use TransactionIdInt,
        AmountFloat,
        JsonDataStringNull;
}
