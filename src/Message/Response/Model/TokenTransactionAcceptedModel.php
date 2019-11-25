<?php

declare(strict_types = 1);

namespace Korobovn\CloudPayments\Message\Response\Model;

use Korobovn\CloudPayments\Message\Traits\ModelField\NameString;
use Korobovn\CloudPayments\Message\Traits\ModelField\AmountFloat;
use Korobovn\CloudPayments\Message\Traits\ModelField\TokenString;
use Korobovn\CloudPayments\Message\Traits\ModelField\IssuerString;
use Korobovn\CloudPayments\Message\Traits\ModelField\ReasonString;
use Korobovn\CloudPayments\Message\Traits\ModelField\StatusString;
use Korobovn\CloudPayments\Message\Traits\ModelField\TestModeBool;
use Korobovn\CloudPayments\Message\Traits\ModelField\ReasonCodeInt;
use Korobovn\CloudPayments\Message\Traits\ModelField\StatusCodeInt;
use Korobovn\CloudPayments\Message\Traits\ModelField\AuthCodeString;
use Korobovn\CloudPayments\Message\Traits\ModelField\AuthDateString;
use Korobovn\CloudPayments\Message\Traits\ModelField\CardTypeString;
use Korobovn\CloudPayments\Message\Traits\ModelField\CurrencyString;
use Korobovn\CloudPayments\Message\Traits\ModelField\AccountIdString;
use Korobovn\CloudPayments\Message\Traits\ModelField\CardTypeCodeInt;
use Korobovn\CloudPayments\Message\Traits\ModelField\CurrencyCodeInt;
use Korobovn\CloudPayments\Message\Traits\ModelField\EmailStringNull;
use Korobovn\CloudPayments\Message\Traits\ModelField\InvoiceIdString;
use Korobovn\CloudPayments\Message\Traits\ModelField\IpAddressString;
use Korobovn\CloudPayments\Message\Traits\ModelField\IpCountryString;
use Korobovn\CloudPayments\Message\Traits\ModelField\IpCityStringNull;
use Korobovn\CloudPayments\Message\Traits\ModelField\TransactionIdInt;
use Korobovn\CloudPayments\Message\Traits\ModelField\AuthDateIsoString;
use Korobovn\CloudPayments\Message\Traits\ModelField\CreatedDateString;
use Korobovn\CloudPayments\Message\Traits\ModelField\DescriptionString;
use Korobovn\CloudPayments\Message\Traits\ModelField\CardFirstSixString;
use Korobovn\CloudPayments\Message\Traits\ModelField\CardLastFourString;
use Korobovn\CloudPayments\Message\Traits\ModelField\IpRegionStringNull;
use Korobovn\CloudPayments\Message\Traits\ModelField\JsonDataStringNull;
use Korobovn\CloudPayments\Message\Traits\ModelField\IpLatitudeFloatNull;
use Korobovn\CloudPayments\Message\Traits\ModelField\CreatedDateIsoString;
use Korobovn\CloudPayments\Message\Traits\ModelField\IpDistrictStringNull;
use Korobovn\CloudPayments\Message\Traits\ModelField\IpLongitudeFloatNull;
use Korobovn\CloudPayments\Message\Traits\ModelField\ConfirmDateStringNull;
use Korobovn\CloudPayments\Message\Traits\ModelField\CardHolderMessageString;
use Korobovn\CloudPayments\Message\Traits\ModelField\IssuerBankCountryString;
use Korobovn\CloudPayments\Message\Traits\ModelField\ConfirmDateIsoStringNull;

/**
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
        ConfirmDateStringNull,
        ConfirmDateIsoStringNull,
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

    /**
     * {@inheritDoc}
     */
    public function toArray(): array
    {
        return [
            'TransactionId'     => $this->getTransactionId(),
            'Amount'            => $this->getAmount(),
            'Currency'          => $this->getCurrency(),
            'CurrencyCode'      => $this->getCurrencyCode(),
            'InvoiceId'         => $this->getInvoiceId(),
            'AccountId'         => $this->getAccountId(),
            'Email'             => $this->getEmail(),
            'Description'       => $this->getDescription(),
            'JsonData'          => $this->getJsonData(),
            'CreatedDate'       => $this->getCreatedDate(),
            'CreatedDateIso'    => $this->getCreatedDateIso(),
            'AuthDate'          => $this->getAuthDate(),
            'AuthDateIso'       => $this->getAuthDateIso(),
            'ConfirmDate'       => $this->getConfirmDate(),
            'ConfirmDateIso'    => $this->getConfirmDateIso(),
            'AuthCode'          => $this->getAuthCode(),
            'TestMode'          => $this->isTestMode(),
            'IpAddress'         => $this->getIpAddress(),
            'IpCountry'         => $this->getIpCountry(),
            'IpCity'            => $this->getIpCity(),
            'IpRegion'          => $this->getIpRegion(),
            'IpDistrict'        => $this->getIpDistrict(),
            'IpLatitude'        => $this->getIpLatitude(),
            'IpLongitude'       => $this->getIpLongitude(),
            'CardFirstSix'      => $this->getCardFirstSix(),
            'CardLastFour'      => $this->getCardLastFour(),
            'CardType'          => $this->getCardType(),
            'CardTypeCode'      => $this->getCardTypeCode(),
            'Issuer'            => $this->getIssuer(),
            'IssuerBankCountry' => $this->getIssuerBankCountry(),
            'Status'            => $this->getStatus(),
            'StatusCode'        => $this->getStatusCode(),
            'Reason'            => $this->getReason(),
            'ReasonCode'        => $this->getReasonCode(),
            'CardHolderMessage' => $this->getCardHolderMessage(),
            'Name'              => $this->getName(),
            'Token'             => $this->getToken(),
        ];
    }
}
