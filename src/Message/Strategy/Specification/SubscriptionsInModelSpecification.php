<?php

namespace Korobovn\CloudPayments\Message\Strategy\Specification;

class SubscriptionsInModelSpecification implements SpecificationInterface
{
    public function isSatisfiedBy(array $response): bool
    {
        if (! is_array($response['Model'])) {
            return false;
        }

        foreach ($response['Model'] as $item) {
            if (empty($item['Id'])) {
                return false;
            }
        }

        return true;
    }
}
