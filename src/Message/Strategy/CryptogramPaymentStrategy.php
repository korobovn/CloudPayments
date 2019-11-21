<?php

namespace Korobovn\CloudPayments\Message\Strategy;

use Korobovn\CloudPayments\Message\Response\InvalidRequestResponse;
use Korobovn\CloudPayments\Message\Response\CryptogramTransactionAcceptedResponse;
use Korobovn\CloudPayments\Message\Response\CryptogramTransactionRejectedResponse;
use Korobovn\CloudPayments\Message\Response\Cryptogram3dSecureAuthRequiredResponse;
use Korobovn\CloudPayments\Message\Strategy\Specification\InvalidRequestSpecification;
use Korobovn\CloudPayments\Message\Strategy\Specification\TransactionAcceptedSpecification;
use Korobovn\CloudPayments\Message\Strategy\Specification\TransactionRejectedSpecification;
use Korobovn\CloudPayments\Message\Strategy\Specification\Cryptogram3dSecureAuthRequiredSpecification;

/**
 * @see https://developers.cloudpayments.ru/#oplata-po-kriptogramme
 */
class CryptogramPaymentStrategy extends AbstractStrategy
{
    /** @var array */
    protected $specifications = [
        InvalidRequestSpecification::class                 => InvalidRequestResponse::class,
        Cryptogram3dSecureAuthRequiredSpecification::class => Cryptogram3dSecureAuthRequiredResponse::class,
        TransactionRejectedSpecification::class            => CryptogramTransactionRejectedResponse::class,
        TransactionAcceptedSpecification::class            => CryptogramTransactionAcceptedResponse::class,
    ];
}
