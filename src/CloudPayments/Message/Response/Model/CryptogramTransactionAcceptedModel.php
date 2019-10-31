<?php

namespace Korobovn\CloudPayments\Message\Response\Model;

use Korobovn\CloudPayments\Message\Traits\ModelField\AccountIdString;
use Korobovn\CloudPayments\Message\Traits\ModelField\AmountFloat;
use Korobovn\CloudPayments\Message\Traits\ModelField\AuthCodeString;
use Korobovn\CloudPayments\Message\Traits\ModelField\AuthDateIsoString;
use Korobovn\CloudPayments\Message\Traits\ModelField\AuthDateString;
use Korobovn\CloudPayments\Message\Traits\ModelField\CardExpDateString;
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
use Korobovn\CloudPayments\Message\Traits\ModelField\IpCityString;
use Korobovn\CloudPayments\Message\Traits\ModelField\IpCountryString;
use Korobovn\CloudPayments\Message\Traits\ModelField\IpDistrictString;
use Korobovn\CloudPayments\Message\Traits\ModelField\IpLatitudeFloat;
use Korobovn\CloudPayments\Message\Traits\ModelField\IpLongitudeFloat;
use Korobovn\CloudPayments\Message\Traits\ModelField\IpRegionString;
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
class CryptogramTransactionAcceptedModel implements ModelInterface
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
        NameString,
        TokenString;

    /**
     * TransactionAcceptedModel constructor.
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
     * @param string      $card_exp_date
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
                                string $card_exp_date,
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
            ->setCardExpDate($card_exp_date)
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
            'CardExpDate'       => $this->getCardExpDate(),
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