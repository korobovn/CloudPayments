<?php

declare(strict_types = 1);

namespace Korobovn\CloudPayments\Message\Request\Model;

use Korobovn\CloudPayments\Message\Traits\ModelField\PeriodInt;
use Korobovn\CloudPayments\Message\Traits\ModelField\AmountFloat;
use Korobovn\CloudPayments\Message\Traits\ModelField\EmailString;
use Korobovn\CloudPayments\Message\Traits\ModelField\TokenString;
use Korobovn\CloudPayments\Message\Traits\ModelField\CurrencyString;
use Korobovn\CloudPayments\Message\Traits\ModelField\IntervalString;
use Korobovn\CloudPayments\Message\Traits\ModelField\AccountIdString;
use Korobovn\CloudPayments\Message\Traits\ModelField\StartDateString;
use Korobovn\CloudPayments\Message\Traits\ModelField\DescriptionString;
use Korobovn\CloudPayments\Message\Traits\ModelField\MaxPeriodsIntNull;
use Korobovn\CloudPayments\Message\Traits\ModelField\RequireConfirmationBool;

/**
 * @see https://developers.cloudpayments.ru/#sozdanie-podpiski-na-rekurrentnye-platezhi
 */
class CreateSubscriptionModel extends AbstractModel
{
    use TokenString,
        AccountIdString,
        DescriptionString,
        EmailString,
        AmountFloat,
        CurrencyString,
        RequireConfirmationBool,
        StartDateString,
        IntervalString,
        PeriodInt,
        MaxPeriodsIntNull;

    /**
     * {@inheritDoc}
     */
    public function toArray(): array
    {
        return [
            'Token'               => $this->getToken(),
            'AccountId'           => $this->getAccountId(),
            'Description'         => $this->getDescription(),
            'Email'               => $this->getEmail(),
            'Amount'              => $this->getAmount(),
            'Currency'            => $this->getCurrency(),
            'RequireConfirmation' => $this->isRequireConfirmation(),
            'StartDate'           => $this->getStartDate(),
            'Interval'            => $this->getInterval(),
            'Period'              => $this->getPeriod(),
            'MaxPeriods'          => $this->getMaxPeriods(),
        ];
    }
}
