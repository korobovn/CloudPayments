<?php

namespace Korobovn\CloudPayments\Message\Strategy;

use Korobovn\CloudPayments\Message\Response\ApplePayStartSessionResponse;
use Korobovn\CloudPayments\Message\Response\InvalidRequestResponse;
use Korobovn\CloudPayments\Message\Strategy\Specification\ApplePayStartSessionCorrectSpecification;
use Korobovn\CloudPayments\Message\Strategy\Specification\InvalidRequestSpecification;

/**
 *
 * @see https://developers.cloudpayments.ru/#zapusk-sessii-dlya-oplaty-cherez-apple-pay
 */
class ApplePayStartSessionStrategy extends AbstractStrategy
{
    protected $specifications = [
        InvalidRequestSpecification::class              => InvalidRequestResponse::class,
        ApplePayStartSessionCorrectSpecification::class => ApplePayStartSessionResponse::class,
    ];
}
