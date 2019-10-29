<?php

namespace Korobovn\CloudPayments\Response\Model;

use Korobovn\CloudPayments\ModelFieldTrait\AccountIdString;
use Korobovn\CloudPayments\ModelFieldTrait\AmountFloat;
use Korobovn\CloudPayments\ModelFieldTrait\CardExpDateString;
use Korobovn\CloudPayments\ModelFieldTrait\CardFirstSixString;
use Korobovn\CloudPayments\ModelFieldTrait\CardHolderMessageString;
use Korobovn\CloudPayments\ModelFieldTrait\CardLastFourString;
use Korobovn\CloudPayments\ModelFieldTrait\CardTypeCodeInt;
use Korobovn\CloudPayments\ModelFieldTrait\CardTypeString;
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
use Korobovn\CloudPayments\ModelFieldTrait\JsonDataString;
use Korobovn\CloudPayments\ModelFieldTrait\NameString;
use Korobovn\CloudPayments\ModelFieldTrait\PaymentAmountFloat;
use Korobovn\CloudPayments\ModelFieldTrait\PaymentCurrencyCodeInt;
use Korobovn\CloudPayments\ModelFieldTrait\PaymentCurrencyString;
use Korobovn\CloudPayments\ModelFieldTrait\ReasonCodeInt;
use Korobovn\CloudPayments\ModelFieldTrait\ReasonString;
use Korobovn\CloudPayments\ModelFieldTrait\StatusCodeInt;
use Korobovn\CloudPayments\ModelFieldTrait\StatusString;
use Korobovn\CloudPayments\ModelFieldTrait\TestModeBool;
use Korobovn\CloudPayments\ModelFieldTrait\TransactionIdInt;

class TransactionRejectedModel implements ModelInterface
{
    use TransactionIdInt,
        AmountFloat,
        CurrencyString,
        CurrencyCodeInt,
        PaymentAmountFloat,
        PaymentCurrencyString,
        PaymentCurrencyCodeInt,
        InvoiceIdString,
        AccountIdString,
        EmailStringNull,
        DescriptionString,
        JsonDataString,
        CreatedDateString,
        CreatedDateIsoString,
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
        NameString;

    /**
     * TransactionRejectedModel constructor.
     *
     * @param int         $transaction_id
     * @param float       $amount
     * @param string      $currency
     * @param int         $currency_code
     * @param float       $payment_amount
     * @param string      $payment_currency
     * @param int         $payment_currency_code
     * @param string      $invoice_id
     * @param string      $account_id
     * @param string|null $email
     * @param string      $description
     * @param string|null $json_data
     * @param string      $created_date
     * @param string      $created_date_iso
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
     */
    public function __construct(int $transaction_id,
                                float $amount,
                                string $currency,
                                int $currency_code,
                                float $payment_amount,
                                string $payment_currency,
                                int $payment_currency_code,
                                string $invoice_id,
                                string $account_id,
                                ?string $email,
                                string $description,
                                ?string $json_data,
                                string $created_date,
                                string $created_date_iso,
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
                                string $name
    )
    {
        $this->setTransactionId($transaction_id)
            ->setAmount($amount)
            ->setCurrency($currency)
            ->setCurrencyCode($currency_code)
            ->setPaymentAmount($payment_amount)
            ->setPaymentCurrency($payment_currency)
            ->setPaymentCurrencyCode($payment_currency_code)
            ->setInvoiceId($invoice_id)
            ->setAccountId($account_id)
            ->setEmail($email)
            ->setDescription($description)
            ->setJsonData($json_data)
            ->setCreatedDate($created_date)
            ->setCreatedDateIso($created_date_iso)
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
            ->setName($name);
    }

    public function toArray(): array
    {
        return [
            'TransactionId'       => $this->getTransactionId(),
            'Amount'              => $this->getAmount(),
            'Currency'            => $this->getCurrency(),
            'CurrencyCode'        => $this->getCurrencyCode(),
            'PaymentAmount'       => $this->getPaymentAmount(),
            'PaymentCurrency'     => $this->getPaymentCurrency(),
            'PaymentCurrencyCode' => $this->getCurrencyCode(),
            'InvoiceId'           => $this->getInvoiceId(),
            'AccountId'           => $this->getAccountId(),
            'Email'               => $this->getEmail(),
            'Description'         => $this->getDescription(),
            'JsonData'            => $this->getJsonData(),
            'CreatedDate'         => $this->getCreatedDate(),
            'CreatedDateIso'      => $this->getCreatedDateIso(),
            'TestMode'            => $this->isTestMode(),
            'IpAddress'           => $this->getIpAddress(),
            'IpCountry'           => $this->getIpCountry(),
            'IpCity'              => $this->getIpCity(),
            'IpRegion'            => $this->getIpRegion(),
            'IpDistrict'          => $this->getIpDistrict(),
            'IpLatitude'          => $this->getIpLatitude(),
            'IpLongitude'         => $this->getIpLongitude(),
            'CardFirstSix'        => $this->getCardFirstSix(),
            'CardLastFour'        => $this->getCardLastFour(),
            'CardExpDate'         => $this->getCardExpDate(),
            'CardType'            => $this->getCardType(),
            'CardTypeCode'        => $this->getCardTypeCode(),
            'Issuer'              => $this->getIssuer(),
            'IssuerBankCountry'   => $this->getIssuerBankCountry(),
            'Status'              => $this->getStatus(),
            'StatusCode'          => $this->getStatusCode(),
            'Reason'              => $this->getReason(),
            'ReasonCode'          => $this->getReasonCode(),
            'CardHolderMessage'   => $this->getCardHolderMessage(),
            'Name'                => $this->getName(),
        ];
    }
}
