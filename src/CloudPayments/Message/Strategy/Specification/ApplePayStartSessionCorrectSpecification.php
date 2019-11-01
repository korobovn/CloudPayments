<?php

namespace Korobovn\CloudPayments\Message\Strategy\Specification;

class ApplePayStartSessionCorrectSpecification implements SpecificationInterface
{
    public function isSatisfiedBy(array $response): bool
    {
        return ! empty($response['Model']['merchantSessionIdentifier']) &&
               (new IsSuccessSpecification)->isSatisfiedBy($response) &&
               (new NotMessageSpecification)->isSatisfiedBy($response);
    }
}
