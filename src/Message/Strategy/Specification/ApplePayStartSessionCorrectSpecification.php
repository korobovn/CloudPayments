<?php

declare(strict_types = 1);

namespace Korobovn\CloudPayments\Message\Strategy\Specification;

class ApplePayStartSessionCorrectSpecification implements SpecificationInterface
{
    /**
     * {@inheritDoc}
     */
    public function isSatisfiedBy(array $response): bool
    {
        return ! empty($response['Model']['merchantSessionIdentifier']) &&
               (new IsSuccessSpecification)->isSatisfiedBy($response) &&
               (new NotMessageSpecification)->isSatisfiedBy($response);
    }
}
