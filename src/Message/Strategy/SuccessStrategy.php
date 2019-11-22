<?php

declare(strict_types = 1);

namespace Korobovn\CloudPayments\Message\Strategy;

use Korobovn\CloudPayments\Message\Response\SuccessResponse;
use Korobovn\CloudPayments\Message\Response\InvalidRequestResponse;
use Korobovn\CloudPayments\Message\Strategy\Specification\IsSuccessSpecification;
use Korobovn\CloudPayments\Message\Strategy\Specification\InvalidRequestSpecification;

class SuccessStrategy extends AbstractStrategy
{
    protected $specifications = [
        InvalidRequestSpecification::class => InvalidRequestResponse::class,
        IsSuccessSpecification::class      => SuccessResponse::class,
    ];
}
