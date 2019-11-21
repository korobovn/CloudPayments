<?php

namespace Korobovn\CloudPayments\Message\Strategy;

use Korobovn\CloudPayments\Message\Response\InvalidRequestResponse;
use Korobovn\CloudPayments\Message\Response\TokenTransactionAcceptedResponse;
use Korobovn\CloudPayments\Message\Response\TokenTransactionRejectedResponse;
use Korobovn\CloudPayments\Message\Strategy\Specification\InvalidRequestSpecification;
use Korobovn\CloudPayments\Message\Strategy\Specification\TransactionAcceptedSpecification;
use Korobovn\CloudPayments\Message\Strategy\Specification\TransactionRejectedSpecification;

/**
 * @see https://developers.cloudpayments.ru/#oplata-po-tokenu-rekarring
 */
class TokenPaymentStrategy extends AbstractStrategy
{
    /** @var array */
    protected $specifications = [
        InvalidRequestSpecification::class      => InvalidRequestResponse::class,
        TransactionRejectedSpecification::class => TokenTransactionRejectedResponse::class,
        TransactionAcceptedSpecification::class => TokenTransactionAcceptedResponse::class,
    ];
}
