<?php

declare(strict_types = 1);

namespace Korobovn\CloudPayments\Message\Response\Model;

use Korobovn\CloudPayments\Message\Traits\ModelField\NameString;
use Korobovn\CloudPayments\Message\Traits\ModelField\AmountFloat;
use Korobovn\CloudPayments\Message\Traits\ModelField\IssuerString;
use Korobovn\CloudPayments\Message\Traits\ModelField\ReasonString;
use Korobovn\CloudPayments\Message\Traits\ModelField\StatusString;
use Korobovn\CloudPayments\Message\Traits\ModelField\TestModeBool;
use Korobovn\CloudPayments\Message\Traits\ModelField\ReasonCodeInt;
use Korobovn\CloudPayments\Message\Traits\ModelField\StatusCodeInt;
use Korobovn\CloudPayments\Message\Traits\ModelField\CardTypeString;
use Korobovn\CloudPayments\Message\Traits\ModelField\CurrencyString;
use Korobovn\CloudPayments\Message\Traits\ModelField\CardTypeCodeInt;
use Korobovn\CloudPayments\Message\Traits\ModelField\CurrencyCodeInt;
use Korobovn\CloudPayments\Message\Traits\ModelField\EmailStringNull;
use Korobovn\CloudPayments\Message\Traits\ModelField\IpAddressString;
use Korobovn\CloudPayments\Message\Traits\ModelField\IpCountryString;
use Korobovn\CloudPayments\Message\Traits\ModelField\IpCityStringNull;
use Korobovn\CloudPayments\Message\Traits\ModelField\TransactionIdInt;
use Korobovn\CloudPayments\Message\Traits\ModelField\CardExpDateString;
use Korobovn\CloudPayments\Message\Traits\ModelField\CreatedDateString;
use Korobovn\CloudPayments\Message\Traits\ModelField\CardFirstSixString;
use Korobovn\CloudPayments\Message\Traits\ModelField\CardLastFourString;
use Korobovn\CloudPayments\Message\Traits\ModelField\IpRegionStringNull;
use Korobovn\CloudPayments\Message\Traits\ModelField\JsonDataStringNull;
use Korobovn\CloudPayments\Message\Traits\ModelField\PaymentAmountFloat;
use Korobovn\CloudPayments\Message\Traits\ModelField\AccountIdStringNull;
use Korobovn\CloudPayments\Message\Traits\ModelField\InvoiceIdStringNull;
use Korobovn\CloudPayments\Message\Traits\ModelField\IpLatitudeFloatNull;
use Korobovn\CloudPayments\Message\Traits\ModelField\CreatedDateIsoString;
use Korobovn\CloudPayments\Message\Traits\ModelField\IpDistrictStringNull;
use Korobovn\CloudPayments\Message\Traits\ModelField\IpLongitudeFloatNull;
use Korobovn\CloudPayments\Message\Traits\ModelField\DescriptionStringNull;
use Korobovn\CloudPayments\Message\Traits\ModelField\PaymentCurrencyString;
use Korobovn\CloudPayments\Message\Traits\ModelField\PaymentCurrencyCodeInt;
use Korobovn\CloudPayments\Message\Traits\ModelField\CardHolderMessageString;
use Korobovn\CloudPayments\Message\Traits\ModelField\IssuerBankCountryString;

/**
 * @see https://developers.cloudpayments.ru/#oplata-po-kriptogramme
 */
class CryptogramTransactionRejectedModel extends AbstractModel
{
    use TransactionIdInt,
        AmountFloat,
        CurrencyString,
        CurrencyCodeInt,
        PaymentAmountFloat,
        PaymentCurrencyString,
        PaymentCurrencyCodeInt,
        InvoiceIdStringNull,
        AccountIdStringNull,
        EmailStringNull,
        DescriptionStringNull,
        JsonDataStringNull,
        CreatedDateString,
        CreatedDateIsoString,
        TestModeBool,
        IpAddressString,
        IpCountryString,
        IpCityStringNull,
        IpRegionStringNull,
        IpDistrictStringNull,
        IpLatitudeFloatNull,
        IpLongitudeFloatNull,
        CardFirstSixString,
        CardLastFourString,
        CardExpDateString,
        CardTypeString,
        CardTypeCodeInt,
        IssuerString,
        IssuerBankCountryString,
        StatusString,
        StatusCodeInt,
        ReasonString,
        ReasonCodeInt,
        CardHolderMessageString,
        NameString;
}
