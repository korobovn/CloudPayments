<?php

namespace Korobovn\CloudPayments\Response\Model;

use Korobovn\CloudPayments\ModelFieldTrait\AccountIdString;
use Korobovn\CloudPayments\ModelFieldTrait\AmountFloat;
use Korobovn\CloudPayments\ModelFieldTrait\CurrencyCodeInt;
use Korobovn\CloudPayments\ModelFieldTrait\CurrencyString;
use Korobovn\CloudPayments\ModelFieldTrait\DescriptionString;
use Korobovn\CloudPayments\ModelFieldTrait\EmailStringNull;
use Korobovn\CloudPayments\ModelFieldTrait\InvoiceIdString;
use Korobovn\CloudPayments\ModelFieldTrait\PaymentAmountFloat;
use Korobovn\CloudPayments\ModelFieldTrait\PaymentCurrencyCodeInt;
use Korobovn\CloudPayments\ModelFieldTrait\PaymentCurrencyString;
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
        DescriptionString;

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
                                string $description)
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
            ->setDescription($description);
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
        ];
    }
}
