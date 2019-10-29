<?php

namespace Korobovn\CloudPayments\Request\Model;

use Korobovn\CloudPayments\ModelFieldTrait\AccountIdString;
use Korobovn\CloudPayments\ModelFieldTrait\AmountFloat;
use Korobovn\CloudPayments\ModelFieldTrait\CardCryptogramPacket;
use Korobovn\CloudPayments\ModelFieldTrait\CurrencyString;
use Korobovn\CloudPayments\ModelFieldTrait\DescriptionString;
use Korobovn\CloudPayments\ModelFieldTrait\InvoiceIdString;
use Korobovn\CloudPayments\ModelFieldTrait\NameString;

class CryptogramPaymentModel implements ModelInterface
{
    use AmountFloat,
        CurrencyString,
        InvoiceIdString,
        DescriptionString,
        AccountIdString,
        NameString,
        CardCryptogramPacket;

    /**
     * CryptogramPaymentModel constructor.
     *
     * @param float  $amount
     * @param string $currency
     * @param string $invoice_id
     * @param string $description
     * @param string $account_id
     * @param string $name
     * @param string $card_cryptogram_packet
     */
    public function __construct(float $amount,
                                string $currency,
                                string $invoice_id,
                                string $description,
                                string $account_id,
                                string $name,
                                string $card_cryptogram_packet)
    {
        $this->setAmount($amount)
            ->setCurrency($currency)
            ->setInvoiceId($invoice_id)
            ->setDescription($description)
            ->setAccountId($account_id)
            ->setName($name)
            ->setCardCryptogramPacket($card_cryptogram_packet);
    }

    public function toArray(): array
    {
        return [
            'Amount'               => $this->getAmount(),
            'Currency'             => $this->getCurrency(),
            'InvoiceId'            => $this->getInvoiceId(),
            'Description'          => $this->getDescription(),
            'AccountId'            => $this->getAccountId(),
            'Name'                 => $this->getName(),
            'CardCryptogramPacket' => $this->getCardCryptogramPacket(),
        ];
    }
}
