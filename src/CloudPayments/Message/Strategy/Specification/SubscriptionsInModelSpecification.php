<?php

namespace Korobovn\CloudPayments\Message\Strategy\Specification;

use Korobovn\CloudPayments\Message\Strategy\Specification\Base\CompositeSpecification;

class SubscriptionsInModelSpecification extends CompositeSpecification
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
