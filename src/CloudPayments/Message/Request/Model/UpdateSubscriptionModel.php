<?php

namespace Korobovn\CloudPayments\Message\Request\Model;

use Korobovn\CloudPayments\Message\Traits\ModelField\AmountFloatNull;
use Korobovn\CloudPayments\Message\Traits\ModelField\CurrencyStringNull;
use Korobovn\CloudPayments\Message\Traits\ModelField\CustomerReceiptStringNull;
use Korobovn\CloudPayments\Message\Traits\ModelField\DescriptionStringNull;
use Korobovn\CloudPayments\Message\Traits\ModelField\IdString;
use Korobovn\CloudPayments\Message\Traits\ModelField\IntervalStringNull;
use Korobovn\CloudPayments\Message\Traits\ModelField\MaxPeriodsIntNull;
use Korobovn\CloudPayments\Message\Traits\ModelField\PeriodIntNull;
use Korobovn\CloudPayments\Message\Traits\ModelField\RequireConfirmationBoolNull;
use Korobovn\CloudPayments\Message\Traits\ModelField\StartDateStringNull;

/**
 *
 * @see https://developers.cloudpayments.ru/#izmenenie-podpiski-na-rekurrentnye-platezhi
 */
class UpdateSubscriptionModel extends AbstractModel
{
    use IdString,
        DescriptionStringNull,
        AmountFloatNull,
        CurrencyStringNull,
        RequireConfirmationBoolNull,
        StartDateStringNull,
        IntervalStringNull,
        PeriodIntNull,
        MaxPeriodsIntNull,
        CustomerReceiptStringNull;
}
