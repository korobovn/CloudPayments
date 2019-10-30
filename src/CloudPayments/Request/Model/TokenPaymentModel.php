<?php

namespace Korobovn\CloudPayments\Request\Model;

use Korobovn\CloudPayments\ModelFieldTrait\AmountFloat;
use Korobovn\CloudPayments\ModelFieldTrait\CurrencyString;
use Korobovn\CloudPayments\ModelFieldTrait\AccountIdString;
use Korobovn\CloudPayments\ModelFieldTrait\DescriptionStringNull;
use Korobovn\CloudPayments\ModelFieldTrait\EmailStringNull;
use Korobovn\CloudPayments\ModelFieldTrait\InvoiceIdStringNull;
use Korobovn\CloudPayments\ModelFieldTrait\IpAddressStringNull;
use Korobovn\CloudPayments\ModelFieldTrait\JsonDataStringNull;
use Korobovn\CloudPayments\ModelFieldTrait\TokenString;

/**
 * Class TokenPaymentModel.
 *
 * @see https://developers.cloudpayments.ru/#obrabotka-3-d-secure
 */
class TokenPaymentModel implements ModelInterface
{
    use AmountFloat,
        CurrencyString,
        AccountIdString,
        TokenString,
        InvoiceIdStringNull,
        DescriptionStringNull,
        IpAddressStringNull,
        EmailStringNull,
        JsonDataStringNull;

    /**
     * TokenPaymentModel constructor.
     *
     * @param float       $amount
     * @param string      $currency
     * @param string      $account_id
     * @param string      $token
     * @param string|null $invoice_id
     * @param string|null $description
     * @param string|null $ip_address
     * @param string|null $email
     * @param string|null $json_data
     */
    public function __construct(float $amount,
                                string $currency,
                                string $account_id,
                                string $token,
                                ?string $invoice_id = null,
                                ?string $description = null,
                                ?string $ip_address = null,
                                ?string $email = null,
                                ?string $json_data = null)
    {
        $this->setAmount($amount)
            ->setCurrency($currency)
            ->setAccountId($account_id)
            ->setToken($token)
            ->setInvoiceId($invoice_id)
            ->setDescription($description)
            ->setIpAddress($ip_address)
            ->setEmail($email)
            ->setJsonData($json_data);
    }

    public function toArray(): array
    {
        return [
            'Amount'      => $this->getAmount(),
            'Currency'    => $this->getDescription(),
            'InvoiceId'   => $this->getAccountId(),
            'Description' => $this->getDescription(),
            'AccountId'   => $this->getAccountId(),
            'Token'       => $this->getToken(),
        ];
    }
}
