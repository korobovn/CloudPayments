<?php

declare(strict_types = 1);

namespace Korobovn\CloudPayments\Message\Request\Model;

use Korobovn\CloudPayments\Message\Traits\ModelField\AmountFloat;
use Korobovn\CloudPayments\Message\Traits\ModelField\TokenString;
use Korobovn\CloudPayments\Message\Traits\ModelField\CurrencyString;
use Korobovn\CloudPayments\Message\Traits\ModelField\AccountIdString;
use Korobovn\CloudPayments\Message\Traits\ModelField\EmailStringNull;
use Korobovn\CloudPayments\Message\Traits\ModelField\JsonDataStringNull;
use Korobovn\CloudPayments\Message\Traits\ModelField\InvoiceIdStringNull;
use Korobovn\CloudPayments\Message\Traits\ModelField\IpAddressStringNull;
use Korobovn\CloudPayments\Message\Traits\ModelField\DescriptionStringNull;

/**
 * @see https://developers.cloudpayments.ru/#obrabotka-3-d-secure
 */
class TokenPaymentModel extends AbstractModel
{
    use AmountFloat,
        CurrencyString,
        AccountIdString,
        TokenString,
        InvoiceIdStringNull,
        DescriptionStringNull,
        IpAddressStringNull,
        EmailStringNull,
        JsonDataStringNull;
}
