<?php

declare(strict_types = 1);

namespace Korobovn\CloudPayments\Message\Strategy;

use Korobovn\CloudPayments\Message\Response\SubscriptionsResponse;
use Korobovn\CloudPayments\Message\Response\InvalidRequestResponse;
use Korobovn\CloudPayments\Message\Strategy\Specification\SubscriptionsSpecification;
use Korobovn\CloudPayments\Message\Strategy\Specification\InvalidRequestSpecification;

/**
 * @see https://developers.cloudpayments.ru/#poisk-podpisok
 */
class SubscriptionsStrategy extends AbstractStrategy
{
    protected $specifications = [
        InvalidRequestSpecification::class  => InvalidRequestResponse::class,
        SubscriptionsSpecification::class   => SubscriptionsResponse::class,
    ];
}
