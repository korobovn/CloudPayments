<?php

namespace Korobovn\CloudPayments\RequestManagementStrategy\Specification;

use Korobovn\CloudPayments\RequestManagementStrategy\Specification\Base\CompositeSpecification;

class IsReasonCodeInModelSpecification extends CompositeSpecification
{
    /**
     * @param array $response
     *
     * @return bool
     */
    public function isSatisfiedBy(array $response): bool
    {
        return ! empty($response['Model']['ReasonCode']);
    }
}
