<?php

namespace Korobovn\CloudPayments\Request\Model;

use Korobovn\CloudPayments\ModelFieldTrait\AccountIdStringNull;
use Korobovn\CloudPayments\ModelFieldTrait\AmountFloat;
use Korobovn\CloudPayments\ModelFieldTrait\CardCryptogramPacket;
use Korobovn\CloudPayments\ModelFieldTrait\CurrencyString;
use Korobovn\CloudPayments\ModelFieldTrait\DescriptionStringNull;
use Korobovn\CloudPayments\ModelFieldTrait\EmailStringNull;
use Korobovn\CloudPayments\ModelFieldTrait\InvoiceIdStringNull;
use Korobovn\CloudPayments\ModelFieldTrait\IpAddressString;
use Korobovn\CloudPayments\ModelFieldTrait\JsonDataStringNull;
use Korobovn\CloudPayments\ModelFieldTrait\NameString;

/**
 * Class CryptogramPaymentModel.
 *
 * @see https://developers.cloudpayments.ru/#oplata-po-kriptogramme
 */
class CryptogramPaymentModel implements ModelInterface
{
    use AmountFloat,
        CurrencyString,
        IpAddressString,
        NameString,
        CardCryptogramPacket,
        InvoiceIdStringNull,
        DescriptionStringNull,
        AccountIdStringNull,
        EmailStringNull,
        JsonDataStringNull;

    /**
     * CryptogramPaymentModel constructor.
     *
     * @param float       $amount
     * @param string      $currency
     * @param string      $ip_address
     * @param string      $name
     * @param string      $card_cryptogram_packet
     * @param string|null $invoice_id
     * @param string|null $description
     * @param string|null $account_id
     * @param string|null $email
     * @param string|null $json_data
     */
    public function __construct(float $amount,
                                string $currency,
                                string $ip_address,
                                string $name,
                                string $card_cryptogram_packet,
                                ?string $invoice_id = null,
                                ?string $description = null,
                                ?string $account_id = null,
                                ?string $email = null,
                                ?string $json_data = null)
    {
        $this->setAmount($amount)
            ->setCurrency($currency)
            ->setIpAddress($ip_address)
            ->setName($name)
            ->setCardCryptogramPacket($card_cryptogram_packet)
            ->setInvoiceId($invoice_id)
            ->setDescription($description)
            ->setAccountId($account_id)
            ->setEmail($email)
            ->setJsonData($json_data);
    }

    public function toArray(): array
    {
        return [
            'Amount'               => $this->getAmount(),
            'Currency'             => $this->getCurrency(),
            'IpAddress'            => $this->getIpAddress(),
            'Name'                 => $this->getName(),
            'CardCryptogramPacket' => $this->getCardCryptogramPacket(),
            'InvoiceId'            => $this->getInvoiceId(),
            'Description'          => $this->getDescription(),
            'AccountId'            => $this->getAccountId(),
            'Email'                => $this->getEmail(),
            'JsonData'             => $this->getJsonData(),
        ];
    }
}
