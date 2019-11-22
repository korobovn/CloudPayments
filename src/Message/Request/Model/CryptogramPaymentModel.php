<?php

declare(strict_types = 1);

namespace Korobovn\CloudPayments\Message\Request\Model;

use Korobovn\CloudPayments\Message\Traits\ModelField\NameString;
use Korobovn\CloudPayments\Message\Traits\ModelField\AmountFloat;
use Korobovn\CloudPayments\Message\Traits\ModelField\CurrencyString;
use Korobovn\CloudPayments\Message\Traits\ModelField\EmailStringNull;
use Korobovn\CloudPayments\Message\Traits\ModelField\IpAddressString;
use Korobovn\CloudPayments\Message\Traits\ModelField\JsonDataStringNull;
use Korobovn\CloudPayments\Message\Traits\ModelField\AccountIdStringNull;
use Korobovn\CloudPayments\Message\Traits\ModelField\InvoiceIdStringNull;
use Korobovn\CloudPayments\Message\Traits\ModelField\CardCryptogramPacketString;
use Korobovn\CloudPayments\Message\Traits\ModelField\DescriptionStringNull;

/**
 * @see https://developers.cloudpayments.ru/#oplata-po-kriptogramme
 */
class CryptogramPaymentModel extends AbstractModel
{
    use AmountFloat,
        CurrencyString,
        IpAddressString,
        NameString,
        CardCryptogramPacketString,
        InvoiceIdStringNull,
        DescriptionStringNull,
        AccountIdStringNull,
        EmailStringNull,
        JsonDataStringNull;
}