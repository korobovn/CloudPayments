<?php

declare(strict_types = 1);

namespace Korobovn\CloudPayments\Message\Strategy;

use Korobovn\CloudPayments\Message\Response\InvalidRequestResponse;
use Korobovn\CloudPayments\Message\Response\ApplePayStartSessionResponse;
use Korobovn\CloudPayments\Message\Strategy\Specification\InvalidRequestSpecification;
use Korobovn\CloudPayments\Message\Strategy\Specification\ApplePayStartSessionCorrectSpecification;

/**
 * @see https://developers.cloudpayments.ru/#zapusk-sessii-dlya-oplaty-cherez-apple-pay
 */
class ApplePayStartSessionStrategy extends AbstractStrategy
{
    protected $specifications = [
        InvalidRequestSpecification::class              => InvalidRequestResponse::class,
        ApplePayStartSessionCorrectSpecification::class => ApplePayStartSessionResponse::class,
    ];
}
