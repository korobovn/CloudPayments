<?php

namespace Korobovn\CloudPayments\Message\Request\Model;

use Korobovn\CloudPayments\Message\Traits\ModelField\AmountFloat;
use Korobovn\CloudPayments\Message\Traits\ModelField\CurrencyString;
use Korobovn\CloudPayments\Message\Traits\ModelField\AccountIdString;
use Korobovn\CloudPayments\Message\Traits\ModelField\DescriptionStringNull;
use Korobovn\CloudPayments\Message\Traits\ModelField\EmailStringNull;
use Korobovn\CloudPayments\Message\Traits\ModelField\InvoiceIdStringNull;
use Korobovn\CloudPayments\Message\Traits\ModelField\IpAddressStringNull;
use Korobovn\CloudPayments\Message\Traits\ModelField\JsonDataStringNull;
use Korobovn\CloudPayments\Message\Traits\ModelField\TokenString;

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
