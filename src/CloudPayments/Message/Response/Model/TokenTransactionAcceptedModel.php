<?php

namespace Korobovn\CloudPayments\Message\Response\Model;

use Korobovn\CloudPayments\Message\Traits\ModelField\AccountIdString;
use Korobovn\CloudPayments\Message\Traits\ModelField\AmountFloat;
use Korobovn\CloudPayments\Message\Traits\ModelField\AuthCodeString;
use Korobovn\CloudPayments\Message\Traits\ModelField\AuthDateIsoString;
use Korobovn\CloudPayments\Message\Traits\ModelField\AuthDateString;
use Korobovn\CloudPayments\Message\Traits\ModelField\CardFirstSixString;
use Korobovn\CloudPayments\Message\Traits\ModelField\CardHolderMessageString;
use Korobovn\CloudPayments\Message\Traits\ModelField\CardLastFourString;
use Korobovn\CloudPayments\Message\Traits\ModelField\CardTypeCodeInt;
use Korobovn\CloudPayments\Message\Traits\ModelField\CardTypeString;
use Korobovn\CloudPayments\Message\Traits\ModelField\ConfirmDateIsoString;
use Korobovn\CloudPayments\Message\Traits\ModelField\ConfirmDateString;
use Korobovn\CloudPayments\Message\Traits\ModelField\CreatedDateIsoString;
use Korobovn\CloudPayments\Message\Traits\ModelField\CreatedDateString;
use Korobovn\CloudPayments\Message\Traits\ModelField\CurrencyCodeInt;
use Korobovn\CloudPayments\Message\Traits\ModelField\CurrencyString;
use Korobovn\CloudPayments\Message\Traits\ModelField\DescriptionString;
use Korobovn\CloudPayments\Message\Traits\ModelField\EmailStringNull;
use Korobovn\CloudPayments\Message\Traits\ModelField\InvoiceIdString;
use Korobovn\CloudPayments\Message\Traits\ModelField\IpAddressString;
use Korobovn\CloudPayments\Message\Traits\ModelField\IpCityStringNull;
use Korobovn\CloudPayments\Message\Traits\ModelField\IpCountryString;
use Korobovn\CloudPayments\Message\Traits\ModelField\IpDistrictStringNull;
use Korobovn\CloudPayments\Message\Traits\ModelField\IpLatitudeFloatNull;
use Korobovn\CloudPayments\Message\Traits\ModelField\IpLongitudeFloatNull;
use Korobovn\CloudPayments\Message\Traits\ModelField\IpRegionStringNull;
use Korobovn\CloudPayments\Message\Traits\ModelField\IssuerBankCountryString;
use Korobovn\CloudPayments\Message\Traits\ModelField\IssuerString;
use Korobovn\CloudPayments\Message\Traits\ModelField\JsonDataStringNull;
use Korobovn\CloudPayments\Message\Traits\ModelField\NameString;
use Korobovn\CloudPayments\Message\Traits\ModelField\ReasonCodeInt;
use Korobovn\CloudPayments\Message\Traits\ModelField\ReasonString;
use Korobovn\CloudPayments\Message\Traits\ModelField\StatusCodeInt;
use Korobovn\CloudPayments\Message\Traits\ModelField\StatusString;
use Korobovn\CloudPayments\Message\Traits\ModelField\TestModeBool;
use Korobovn\CloudPayments\Message\Traits\ModelField\TokenString;
use Korobovn\CloudPayments\Message\Traits\ModelField\TransactionIdInt;

/**
 *
 * @see https://developers.cloudpayments.ru/#oplata-po-kriptogramme
 */
class TokenTransactionAcceptedModel extends AbstractModel
{
    use TransactionIdInt,
        AmountFloat,
        CurrencyString,
        CurrencyCodeInt,
        InvoiceIdString,
        AccountIdString,
        EmailStringNull,
        DescriptionString,
        JsonDataStringNull,
        CreatedDateString,
        CreatedDateIsoString,
        AuthDateString,
        AuthDateIsoString,
        ConfirmDateString,
        ConfirmDateIsoString,
        AuthCodeString,
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
        CardTypeString,
        CardTypeCodeInt,
        IssuerString,
        IssuerBankCountryString,
        StatusString,
        StatusCodeInt,
        ReasonString,
        ReasonCodeInt,
        CardHolderMessageString,
        NameString,
        TokenString;
}
