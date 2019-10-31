<?php

namespace Korobovn\CloudPayments\Message\Request\Model;

use Korobovn\CloudPayments\Message\Traits\ModelField\AccountIdStringNull;
use Korobovn\CloudPayments\Message\Traits\ModelField\AmountFloat;
use Korobovn\CloudPayments\Message\Traits\ModelField\CardCryptogramPacket;
use Korobovn\CloudPayments\Message\Traits\ModelField\CurrencyString;
use Korobovn\CloudPayments\Message\Traits\ModelField\DescriptionStringNull;
use Korobovn\CloudPayments\Message\Traits\ModelField\EmailStringNull;
use Korobovn\CloudPayments\Message\Traits\ModelField\InvoiceIdStringNull;
use Korobovn\CloudPayments\Message\Traits\ModelField\IpAddressString;
use Korobovn\CloudPayments\Message\Traits\ModelField\JsonDataStringNull;
use Korobovn\CloudPayments\Message\Traits\ModelField\NameString;

/**
 *
 * @see https://developers.cloudpayments.ru/#oplata-po-kriptogramme
 */
class CryptogramPaymentModel extends AbstractModel
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
}
