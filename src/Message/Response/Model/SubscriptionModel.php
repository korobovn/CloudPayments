<?php

declare(strict_types = 1);

namespace Korobovn\CloudPayments\Message\Response\Model;

use Korobovn\CloudPayments\Message\Traits\ModelField\IdString;
use Korobovn\CloudPayments\Message\Traits\ModelField\PeriodInt;
use Korobovn\CloudPayments\Message\Traits\ModelField\AmountFloat;
use Korobovn\CloudPayments\Message\Traits\ModelField\EmailString;
use Korobovn\CloudPayments\Message\Traits\ModelField\StatusString;
use Korobovn\CloudPayments\Message\Traits\ModelField\StatusCodeInt;
use Korobovn\CloudPayments\Message\Traits\ModelField\CurrencyString;
use Korobovn\CloudPayments\Message\Traits\ModelField\IntervalString;
use Korobovn\CloudPayments\Message\Traits\ModelField\AccountIdString;
use Korobovn\CloudPayments\Message\Traits\ModelField\CurrencyCodeInt;
use Korobovn\CloudPayments\Message\Traits\ModelField\IntervalCodeInt;
use Korobovn\CloudPayments\Message\Traits\ModelField\StartDateString;
use Korobovn\CloudPayments\Message\Traits\ModelField\DescriptionString;
use Korobovn\CloudPayments\Message\Traits\ModelField\MaxPeriodsIntNull;
use Korobovn\CloudPayments\Message\Traits\ModelField\StartDateIsoString;
use Korobovn\CloudPayments\Message\Traits\ModelField\CultureNameStringNull;
use Korobovn\CloudPayments\Message\Traits\ModelField\RequireConfirmationBool;
use Korobovn\CloudPayments\Message\Traits\ModelField\FailedTransactionsNumberInt;
use Korobovn\CloudPayments\Message\Traits\ModelField\LastTransactionDateStringNull;
use Korobovn\CloudPayments\Message\Traits\ModelField\NextTransactionDateStringNull;
use Korobovn\CloudPayments\Message\Traits\ModelField\SuccessfulTransactionsNumberInt;
use Korobovn\CloudPayments\Message\Traits\ModelField\LastTransactionDateIsoStringNull;
use Korobovn\CloudPayments\Message\Traits\ModelField\NextTransactionDateIsoStringNull;

/**
 * @see https://developers.cloudpayments.ru/#sozdanie-podpiski-na-rekurrentnye-platezhi
 * @see https://developers.cloudpayments.ru/#zapros-informatsii-o-podpiske
 * @see https://developers.cloudpayments.ru/#izmenenie-podpiski-na-rekurrentnye-platezhi
 */
class SubscriptionModel extends AbstractModel
{
    use IdString,
        AccountIdString,
        DescriptionString,
        EmailString,
        AmountFloat,
        CurrencyCodeInt,
        CurrencyString,
        RequireConfirmationBool,
        StartDateString,
        StartDateIsoString,
        IntervalCodeInt,
        IntervalString,
        PeriodInt,
        MaxPeriodsIntNull,
        CultureNameStringNull,
        StatusCodeInt,
        StatusString,
        SuccessfulTransactionsNumberInt,
        FailedTransactionsNumberInt,
        LastTransactionDateStringNull,
        LastTransactionDateIsoStringNull,
        NextTransactionDateStringNull,
        NextTransactionDateIsoStringNull;

    /**
     * {@inheritDoc}
     */
    public function toArray(): array
    {
        return [
            'Id'                           => $this->getId(),
            'AccountId'                    => $this->getAccountId(),
            'Description'                  => $this->getDescription(),
            'Email'                        => $this->getEmail(),
            'Amount'                       => $this->getAmount(),
            'CurrencyCode'                 => $this->getCurrencyCode(),
            'Currency'                     => $this->getCurrency(),
            'RequireConfirmation'          => $this->isRequireConfirmation(),
            'StartDate'                    => $this->getStartDate(),
            'StartDateIso'                 => $this->getStartDateIso(),
            'IntervalCode'                 => $this->getIntervalCode(),
            'Interval'                     => $this->getInterval(),
            'Period'                       => $this->getPeriod(),
            'MaxPeriods'                   => $this->getMaxPeriods(),
            'CultureName'                  => $this->getCultureName(),
            'StatusCode'                   => $this->getStatusCode(),
            'Status'                       => $this->getStatus(),
            'SuccessfulTransactionsNumber' => $this->getSuccessfulTransactionsNumber(),
            'FailedTransactionsNumber'     => $this->getFailedTransactionsNumber(),
            'LastTransactionDate'          => $this->getLastTransactionDate(),
            'LastTransactionDateIso'       => $this->getLastTransactionDate(),
            'NextTransactionDate'          => $this->getNextTransactionDate(),
            'NextTransactionDateIso'       => $this->getNextTransactionDateIso(),
        ];
    }
}
