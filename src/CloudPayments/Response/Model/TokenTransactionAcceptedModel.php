<?php

namespace Korobovn\CloudPayments\Response\Model;

use Korobovn\CloudPayments\ModelFieldTrait\AccountIdString;
use Korobovn\CloudPayments\ModelFieldTrait\AmountFloat;
use Korobovn\CloudPayments\ModelFieldTrait\AuthCodeString;
use Korobovn\CloudPayments\ModelFieldTrait\AuthDateIsoString;
use Korobovn\CloudPayments\ModelFieldTrait\AuthDateString;
use Korobovn\CloudPayments\ModelFieldTrait\CardFirstSixString;
use Korobovn\CloudPayments\ModelFieldTrait\CardHolderMessageString;
use Korobovn\CloudPayments\ModelFieldTrait\CardLastFourString;
use Korobovn\CloudPayments\ModelFieldTrait\CardTypeCodeInt;
use Korobovn\CloudPayments\ModelFieldTrait\CardTypeString;
use Korobovn\CloudPayments\ModelFieldTrait\ConfirmDateIsoString;
use Korobovn\CloudPayments\ModelFieldTrait\ConfirmDateString;
use Korobovn\CloudPayments\ModelFieldTrait\CreatedDateIsoString;
use Korobovn\CloudPayments\ModelFieldTrait\CreatedDateString;
use Korobovn\CloudPayments\ModelFieldTrait\CurrencyCodeInt;
use Korobovn\CloudPayments\ModelFieldTrait\CurrencyString;
use Korobovn\CloudPayments\ModelFieldTrait\DescriptionString;
use Korobovn\CloudPayments\ModelFieldTrait\EmailStringNull;
use Korobovn\CloudPayments\ModelFieldTrait\InvoiceIdString;
use Korobovn\CloudPayments\ModelFieldTrait\IpAddressString;
use Korobovn\CloudPayments\ModelFieldTrait\IpCityString;
use Korobovn\CloudPayments\ModelFieldTrait\IpCountryString;
use Korobovn\CloudPayments\ModelFieldTrait\IpDistrictString;
use Korobovn\CloudPayments\ModelFieldTrait\IpLatitudeFloat;
use Korobovn\CloudPayments\ModelFieldTrait\IpLongitudeFloat;
use Korobovn\CloudPayments\ModelFieldTrait\IpRegionString;
use Korobovn\CloudPayments\ModelFieldTrait\IssuerBankCountryString;
use Korobovn\CloudPayments\ModelFieldTrait\IssuerString;
use Korobovn\CloudPayments\ModelFieldTrait\JsonDataStringNull;
use Korobovn\CloudPayments\ModelFieldTrait\NameString;
use Korobovn\CloudPayments\ModelFieldTrait\ReasonCodeInt;
use Korobovn\CloudPayments\ModelFieldTrait\ReasonString;
use Korobovn\CloudPayments\ModelFieldTrait\StatusCodeInt;
use Korobovn\CloudPayments\ModelFieldTrait\StatusString;
use Korobovn\CloudPayments\ModelFieldTrait\TestModeBool;
use Korobovn\CloudPayments\ModelFieldTrait\TokenString;
use Korobovn\CloudPayments\ModelFieldTrait\TransactionIdInt;

/**
 *
 * @see https://developers.cloudpayments.ru/#oplata-po-kriptogramme
 */
class TokenTransactionAcceptedModel implements ModelInterface
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
        IpCityString,
        IpRegionString,
        IpDistrictString,
        IpLatitudeFloat,
        IpLongitudeFloat,
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
     *
     * @param int         $transaction_id
     * @param float       $amount
     * @param string      $currency
     * @param int         $currency_code
     * @param string      $invoice_id
     * @param string      $account_id
     * @param string|null $email
     * @param string      $description
     * @param string|null $json_data
     * @param string      $created_date
     * @param string      $created_date_iso
     * @param string      $auth_date
     * @param string      $auth_date_iso
     * @param string      $confirm_date
     * @param string      $confirm_date_iso
     * @param string      $auth_code
     * @param bool        $test_mode
     * @param string      $ip_address
     * @param string      $ip_country
     * @param string      $ip_city
     * @param string      $ip_region
     * @param string      $ip_district
     * @param float       $ip_latitude
     * @param float       $ip_longitude
     * @param string      $card_first_six
     * @param string      $card_last_four
     * @param string      $card_type
     * @param int         $card_type_code
     * @param string      $issuer
     * @param string      $issuer_bank_country
     * @param string      $status
     * @param int         $status_code
     * @param string      $reason
     * @param int         $reason_code
     * @param string      $card_holder_message
     * @param string      $name
     * @param string      $token
     */
    public function __construct(int $transaction_id,
                                float $amount,
                                string $currency,
                                int $currency_code,
                                string $invoice_id,
                                string $account_id,
                                ?string $email,
                                string $description,
                                ?string $json_data,
                                string $created_date,
                                string $created_date_iso,
                                string $auth_date,
                                string $auth_date_iso,
                                string $confirm_date,
                                string $confirm_date_iso,
                                string $auth_code,
                                bool $test_mode,
                                string $ip_address,
                                string $ip_country,
                                string $ip_city,
                                string $ip_region,
                                string $ip_district,
                                float $ip_latitude,
                                float $ip_longitude,
                                string $card_first_six,
                                string $card_last_four,
                                string $card_type,
                                int $card_type_code,
                                string $issuer,
                                string $issuer_bank_country,
                                string $status,
                                int $status_code,
                                string $reason,
                                int $reason_code,
                                string $card_holder_message,
                                string $name,
                                string $token
    )
    {
        $this->setTransactionId($transaction_id)
            ->setAmount($amount)
            ->setCurrency($currency)
            ->setCurrencyCode($currency_code)
            ->setInvoiceId($invoice_id)
            ->setAccountId($account_id)
            ->setEmail($email)
            ->setDescription($description)
            ->setJsonData($json_data)
            ->setCreatedDate($created_date)
            ->setCreatedDateIso($created_date_iso)
            ->setAuthDate($auth_date)
            ->setAuthDateIso($auth_date_iso)
            ->setConfirmDate($confirm_date)
            ->setConfirmDateIso($confirm_date_iso)
            ->setAuthCode($auth_code)
            ->setTestMode($test_mode)
            ->setIpAddress($ip_address)
            ->setIpCountry($ip_country)
            ->setIpCity($ip_city)
            ->setIpRegion($ip_region)
            ->setIpDistrict($ip_district)
            ->setIpLatitude($ip_latitude)
            ->setIpLongitude($ip_longitude)
            ->setCardFirstSix($card_first_six)
            ->setCardLastFour($card_last_four)
            ->setCardType($card_type)
            ->setCardTypeCode($card_type_code)
            ->setIssuer($issuer)
            ->setIssuerBankCountry($issuer_bank_country)
            ->setStatus($status)
            ->setStatusCode($status_code)
            ->setReason($reason)
            ->setReasonCode($reason_code)
            ->setCardHolderMessage($card_holder_message)
            ->setName($name)
            ->setToken($token);
    }

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
