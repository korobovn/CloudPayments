<?php

namespace Korobovn\CloudPayments\RequestManagementStrategy\Specification;

use Korobovn\CloudPayments\RequestManagementStrategy\Specification\Base\CompositeSpecification;

class ZeroReasonCodeInModelSpecification extends CompositeSpecification
{
    /**
     * @param array $response
     *
     * @return bool
     */
    public function isSatisfiedBy(array $response): bool
    {
        return isset($response['Model']['ReasonCode']) && $response['Model']['ReasonCode'] == 0;
    }
}
